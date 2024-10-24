<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StripeCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stripe_customer_id',
        'stripe_subscription_id',
        'payment_method_id',
    ];

    /**
     * Get the user associated with this Stripe customer.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all subscriptions for this Stripe customer.
     * @return HasMany
     */
    public function planSubscriptions(): HasMany
    {
        return $this->hasMany(PlanSubscription::class, 'stripe_customer_id', 'stripe_customer_id');
    }

    /**
     * Get all transactions related to this Stripe customer.
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'stripe_customer_id', 'stripe_customer_id');
    }
}
