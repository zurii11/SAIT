<?php

namespace App\Models;

use App\Models\Traits\AllForCompany;
use Carbon\Carbon;
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

    public function getStartTimeAttribute($value): string
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function scopeActive($query)
    {
        return $query -> where('active', true);
    }

    public function scopeArchived($query)
    {
        return $query -> where('active', false);
    }
}
