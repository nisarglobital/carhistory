<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('cascade');
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade');
            $table->string('stripe_customer_id')->nullable();
            $table->string('stripe_subscription_id')->nullable()->comment('Stripe subscription ID');
            $table->enum('status', ['active', 'inactive', 'cancelled', 'pending', 'expired'])->default('pending');
            $table->date('start_date')->nullable()->comment('Subscription start date');
            $table->date('end_date')->nullable()->comment('Subscription end date');
            $table->date('reset_date')->nullable()->comment('Subscription end date');
            $table->integer('remaining_reports')->nullable()->comment('Number of reports remaining');
            $table->integer('total_reports')->nullable()->comment('Number of reports allowed');
            $table->decimal('price', 8, 2)->comment('Price at the time of subscription');
            $table->decimal('total_cost', 8, 2)->comment('Total cost of the subscription');
            $table->decimal('discount', 8, 3)->default(0)->comment('Discount applied to the subscription');
            $table->json('subscription_data')->nullable()->comment('Store additional data from Stripe subscription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_subscriptions');
    }
};
