<?php

namespace App\Models;

use App\Models\Traits\AllForCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    use AllForCompany;

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
