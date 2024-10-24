<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'stripe_customer_id',
        'stripe_invoice_id',
        'stripe_payment_intent_id',
        'currency',
        'amount',
        'amount_paid',
        'amount_due',
        'status',
        'invoice_url',
        'invoice_pdf_url',
        'invoice_data',
    ];

    /**
     * Get the user associated with this transaction.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plan associated with this transaction.
     * @return BelongsTo
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Get the Stripe customer related to this transaction.
     * @return BelongsTo
     */
    public function stripeCustomer(): BelongsTo
    {
        return $this->belongsTo(StripeCustomer::class, 'stripe_customer_id', 'stripe_customer_id');
    }
}
