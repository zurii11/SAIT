<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;
    use AllFor;

    protected $guarded = [];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function busDriver()
    {
        return $this->belongsTo(BusDriver::class, 'buses_drivers_id');
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
