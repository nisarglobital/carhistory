<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Check if the user is an admin
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->type === 'admin';
    }


    /**
     * Check if the user is a regular user
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->type === 'user';
    }

    public function settings()
    {
        return $this->hasMany(DynamicSetting::class);
    }


    /**
     * Define the relationship to StripeCustomer
     * @return HasOne
     */
    public function stripeCustomer(): HasOne
    {
        return $this->hasOne(StripeCustomer::class);
    }


    public function subscriptions(): HasMany
    {
        return $this->hasMany(PlanSubscription::class);
    }

    public function activeSubscription(): HasOne
    {
        return $this->hasOne(PlanSubscription::class)->where('status', 'active');
    }

    public function pastSubscriptions(): HasMany
    {
        return $this->hasMany(PlanSubscription::class)
            ->where('status', '!=', 'pending')
            ->where('status', '!=', 'active');
    }



    /**
     * Check if the user has an active subscription.
     * @return bool
     */
    public function hasActiveSubscription(): bool
    {
        return $this->activeSubscription()->exists();
    }

    /**
     * Check if the user has an expired subscription.
     * This considers any subscription that is not active or pending as expired.
     * @return bool
     */
    public function hasExpiredSubscription(): bool
    {
        return $this->subscriptions()
            ->whereNotIn('status', ['active', 'pending'])
            ->exists();
    }

    /**
     * Check if the user has a pending subscription.
     * @return bool
     */
    public function hasPendingSubscription(): bool
    {
        return $this->subscriptions()
            ->where('status', 'pending')
            ->exists();
    }

}
