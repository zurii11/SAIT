<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    use AllFor;

    protected $fillable = [
        'price',
        'cash_register_id',
        'start_station_id',
        'stop_station_id',
        'company_id'
    ];

    public function startStation()
    {
        return $this->belongsTo(Station::class);
    }


    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function routeStops()
    {
        return $this->hasMany(RouteStop::class);
    }

    public function routeMainStop()
    {
        $mainStop = $this->hasMany(RouteStop::class)
            ->with('stopStation')
            ->where('main', true)
            ->first();
        return ($mainStop)?$mainStop->stopStation->name:'';
    }

    public function additionalStops()
    {
        return $this->hasMany(RouteStop::class)
            ->with('stopStation')
            ->where('main', false)
            ->get();
    }

    public function cashRegister()
    {
        return $this->belongsTo(CashRegister::class, 'cash_register_id');
    }

    public function stops()
    {
        return $this->hasMany(RouteStop::class);
    }
}
