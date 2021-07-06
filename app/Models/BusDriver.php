<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDriver extends Model
{
    use HasFactory;
    use AllFor;

    protected $table = 'buses_drivers';

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function departures()
    {
        return $this->hasMany(Departure::class);
    }
}
