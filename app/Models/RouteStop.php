<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteStop extends Model
{
    use HasFactory;
    use AllFor;

    protected $fillable = [
        'route_id',
        'station_id',
        'price',
        'main'
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function stopStation()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }


}
