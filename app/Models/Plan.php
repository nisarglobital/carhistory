<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'currency',
        'number_of_reports',
        'price_per_report',
        'total_cost',
        'subscription_term',
        'monthly_cost',
        'discount',
        'total_savings',
        'price',
        'plan_type',
        'billing_cycle',
        'description',
        'features',
    ];

    /**
     * Get the formatted monthly price with currency.
     */
    public function getFormattedMonthlyPriceAttribute(): float
    {
        return number_format($this->monthly_price, 2);
    }

    /**
     * Get the formatted annual price with currency.
     */
    public function getFormattedAnnualPriceAttribute(): float
    {
        return number_format($this->annual_price, 2);
    }

    /**
     * Get the formatted final price with currency.
     */
    public function getFormattedPriceAttribute(): float
    {
        return number_format($this->price, 2);
    }


    /**
     * Get the annual price after applying the discount.
     */
    /*public function getDiscountedAnnualPriceAttribute(): float
    {
        $discount = $this->total_cost * ($this->discount / 100);
        return number_format($this->total_cost - $discount, 2);
    }*/

}
