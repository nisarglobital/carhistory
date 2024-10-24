<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VinReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vin_code', 'refresh_count', 'json_data'];

    protected $casts = [
        'json_data' => 'array', // Cast JSON data as an array automatically
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); // Relationship with the User model
    }
}
