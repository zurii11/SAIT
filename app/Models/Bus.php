<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    use AllFor;

    protected $fillable = [
        'model',
        'color',
        'plate_number',
        'seats',
        'company_id'
    ];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'buses_drivers');
    }
}
