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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable()->comment('B2C or B2B');
            $table->integer('number_of_reports')->comment('Number of reports');
            $table->decimal('price_per_report', 8, 2)->comment('Price per report');
            $table->decimal('total_cost', 8, 2)->comment('Total cost');
            $table->integer('subscription_term')->nullable()->comment('Subscription term in months (e.g. 6 months)');
            $table->decimal('monthly_cost', 8, 2)->nullable()->comment('Monthly cost for subscription plans');
            $table->decimal('discount', 8, 3)->default(0)->comment('Discount in percentage');
            $table->decimal('total_savings', 8, 2)->nullable()->comment('Total savings (if applicable)');
            $table->decimal('price', 8, 2)->comment('changeable price');
            $table->enum('plan_type', ['report_based', 'subscription_based'])->comment('Plan Type: report-based or subscription-based');
            $table->enum('billing_cycle', ['allowed_numbers','monthly', 'annually','one_time'])->nullable()->comment('For subscription-based plans, set billing cycle');
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
