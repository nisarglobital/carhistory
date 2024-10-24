<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'transaction_id',
        'stripe_customer_id',
        'stripe_subscription_id',
        'status',
        'start_date',
        'end_date',
        'reset_date',
        'total_reports',
        'remaining_reports',
        'price',
        'total_cost',
        'discount',
        'subscription_data',
    ];


    /**
     * Get the user that owns the subscription.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the plan associated with the subscription.
     * @return BelongsTo
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }


    /**
     * Get the plan associated with the Transaction.
     * @return BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * Check if the subscription is active.
     * @return bool
     */
    public function isActive(): bool
    {
        //return $this->status === 'active' && $this->end_date && $this->end_date->isFuture();
        return $this->status === 'active';
    }
}
