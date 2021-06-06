<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    use AllFor;

    protected $fillable = [
        'start_time',
        'week_day',
        'route_id',
        'company_id',
        'active'
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

    public function scopeDisabled($query)
    {
        return $query -> where('active', false);
    }

    public function disable()
    {
        return $this->update(['active' => false]);
    }

    public function enable()
    {
        return $this->update(['active' => true]);
    }
}
