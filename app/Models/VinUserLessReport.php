<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VinUserLessReport extends Model
{
    use HasFactory;

    protected $table = 'vin_userless_reports';


    protected $fillable = ['vin_code', 'refresh_count', 'json_data'];

    protected $casts = [
        'json_data' => 'array', // Cast JSON data as an array automatically
    ];
}
