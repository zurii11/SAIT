<?php

namespace App\Models;

use App\Models\Traits\AllForCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    use AllForCompany;
    protected $fillable = [
        'price',
        'stop_stations_ids',
        'cash_register_number',
        'start_station_id',
        'company_id'
    ];
    protected $casts = [
        'stop_stations_ids' => 'array'
    ];
    public function startStation(){
        return $this->belongsTo(Station::class);
    }

    public function shedules()
    {
        return $this->hasMany(Shedule::class);
    }

    public function stops()
    {
        $station_names = Station::whereIn('id', $this->stop_stations_ids)->get()->map(function ($station) {
            return $station->name;
        })->implode(' - ');
        ;
        return $station_names;
    }
}
