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
        'cash_register_id',
        'start_station_id',
        'stop_station_id',
        'company_id'
    ];

    public function startStation()
    {
        return $this->belongsTo(Station::class);
    }

    public function stopStation()
    {
        return $this->belongsTo(Station::class);
    }

    public function cashRegister()
    {
        return $this->belongsTo(CashRegister::class, 'cash_register_id');
    }

    public function shedules()
    {
        return $this->hasMany(Shedule::class);
    }

}
