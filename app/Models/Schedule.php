<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'week_day',
        'route_id',
        'company_id'
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
