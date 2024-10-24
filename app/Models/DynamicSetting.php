<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class DynamicSetting extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'input_type', 'key', 'value'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @param $value
     * @return array|string|string[]
     */
    public function getKeyAttribute($value): array|string
    {
        return str_replace('-',' ',ucfirst($value));
    }

}

