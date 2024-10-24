<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\PlanSubscription;
use App\Models\Plan;
use App\Models\StripeCustomer;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Invoice;
use Stripe\InvoiceItem;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey('sk_test_51OkIbqIsQbNpGrmlsCgGQDFGtMRQLQK4qs0YfI7fFAKH4BDUQ9fh4kAoIJBP8G25kDQuL4yloVWRnRUcKokKHlDB00XSGwIQTx');
    }

    /**
     * Create a new Stripe customer.
     */
    public function createCustomer(Request $request)
    {
        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $customer = Customer::create([
            'email' => $user->email,
            'name' => $user->name,
        ]);

        $stripeCustomer = StripeCustomer::create([
            'user_id' => $user->id,
            'stripe_customer_id' => $customer->id,
        ]);

        return response()->json([
            'message' => 'Stripe customer created successfully.',
            'stripe_customer_id' => $customer->id,
        ]);
    }

    /**
     * Create an invoice item and generate an unpaid invoice link for payment.
     */
    public function generateInvoice($plan_id)
    {
        $user = User::find(auth()->user()->id);
        $plan = Plan::find($plan_id);

        if (!$user || !$plan) {
            return response()->json(['error' => 'User or Plan not found'], 404);
        }

        // Check if the user already has a Stripe customer ID
        $stripeCustomer = $user->stripeCustomer;
        $stripe_customer_id = $stripeCustomer ? $stripeCustomer->stripe_customer_id : null;

        if (!$stripe_customer_id) {
            // If the Stripe customer doesn't exist, create a new one
            $customer = Customer::create([
                'email' => $user->email,
                'name' => $user->name,
            ]);

            sleep(2);

            if ($customer->id) {
                $stripe_customer_id = $customer->id;

                // Store the new Stripe customer ID in the database
                StripeCustomer::create([
                    'user_id' => $user->id,
                    'stripe_customer_id' => $stripe_customer_id,
                ]);
            } else {
                return response()->json(['error' => 'Stripe Customer not found'], 404);
            }
        }

        // Create an invoice item
        $invoiceItem = InvoiceItem::create([
            'customer' => $stripe_customer_id,
            'amount' => $plan->price * 100, // Convert to cents
            'currency' => strtolower($plan->currency) ?? 'usd',
            'description' => $plan->category.' - '.$plan->name,
        ]);

        // Now, create the invoice with `pending_invoice_items_behavior` set to `include`
        $invoice = Invoice::create([
            'customer' => $stripe_customer_id,
            'auto_advance' => true, // Keep the invoice open until the customer pays
            'pending_invoice_items_behavior' => 'include', // Include pending items in the invoice
            'collection_method' => 'send_invoice',
            'payment_settings' => ['payment_method_types' => ['card']],
            'days_until_due' => 7, // Optional: specify a due date
        ]);

        // Finalize the invoice to make it ready for payment
        $invoice->finalizeInvoice();
        $invoice->sendInvoice();


        // Create a new transaction record with initial data
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'stripe_customer_id' => $stripe_customer_id,
            'stripe_invoice_id' => $invoice->id,
            'stripe_payment_intent_id' => $invoice->payment_intent,
            'currency' => strtolower($plan->currency) ?? 'usd',
            'amount' => $plan->price * 100,
            'amount_paid' => 0, // Initially zero until payment is confirmed
            'amount_due' => $invoice->amount_due,
            'status' => 'pending', // Mark as pending until payment is confirmed
            'invoice_url' => $invoice->hosted_invoice_url,
            'invoice_pdf_url' => $invoice->invoice_pdf,
            'invoice_data' => json_encode($invoice->toArray()),
        ]);

        if ($transaction) {
            // Determine the subscription dates
            $startDate = now();
            $endDate = $startDate->copy()->addMonths($plan->subscription_term ?? 1);

            $plansSubscribed = [
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'transaction_id' => $transaction->id,
                'stripe_customer_id' => $stripe_customer_id,
                'stripe_subscription_id' => $invoice->subscription,
                'status' => 'pending',
                'start_date' => $startDate,
                'end_date' => $endDate,
                'reset_date' => $endDate,
                'total_reports' => $plan->number_of_reports,
                'remaining_reports' => $plan->number_of_reports,
                'price' => $plan->price,
                'total_cost' => $invoice->amount_paid / 100,
                'discount' => $plan->discount,
                'subscription_data' => json_encode($plan->toArray()),
            ];
            PlanSubscription::create($plansSubscribed);
        }

        return redirect()->route('transactions')->with('success', 'Invoice generated successfully.');
    }

    /**
     * Handle the Stripe webhook for invoice.payment_succeeded.
     */
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $webhookSecret);
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'invoice.payment_succeeded') {
            $invoice = $event->data->object;
            $this->handleInvoicePaymentSucceeded($invoice);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Process the successful invoice payment.
     */
    protected function handleInvoicePaymentSucceeded($invoice)
    {
        $stripeCustomerId = $invoice->customer;
        $user = User::whereHas('stripeCustomer', function ($query) use ($stripeCustomerId) {
            $query->where('stripe_customer_id', $stripeCustomerId);
        })->first();

        if (!$user) {
            Log::error('User not found for Stripe customer ID: ' . $stripeCustomerId);
            return;
        }

        // Find the corresponding transaction record by the Stripe invoice ID
        $transaction = Transaction::where('stripe_invoice_id', $invoice->id)->first();
        $plan_subscribed = PlanSubscription::where('transaction_id', $transaction->id)->first();

        if ($transaction) {
            // Update the transaction record with payment details
            $transaction->update([
                'amount_paid' => $invoice->amount_paid,
                'amount_due' => $invoice->amount_remaining,
                'status' => 'paid', // Mark as paid upon successful payment
                'invoice_data' => json_encode($invoice->toArray()),
            ]);

            if ($plan_subscribed) {
                $plan_subscribed->update(['status' => 'active']);
            }

            Log::info('Transaction updated for user ID: ' . $user->id . ', transaction ID: ' . $transaction->id);
        } else {
            Log::error('Transaction not found for Stripe invoice ID: ' . $invoice->id);
        }
    }
}
