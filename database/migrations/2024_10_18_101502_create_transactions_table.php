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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('stripe_customer_id');
            $table->string('stripe_invoice_id')->unique();
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('currency')->default('usd');
            $table->integer('amount'); // Amount in cents
            $table->integer('amount_paid')->nullable(); // Actual amount paid in cents
            $table->integer('amount_due')->nullable(); // Amount due in cents
            $table->string('status'); // e.g., 'paid', 'pending'
            $table->tinyText('invoice_url')->nullable();
            $table->tinyText('invoice_pdf_url')->nullable();
            $table->json('invoice_data')->nullable(); // Store additional invoice data if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
