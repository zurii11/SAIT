<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'phone_number',
        'company_id'
    ];

    public function buses()
    {
        return $this->belongsToMany(Bus::class, 'buses_drivers');
    }

    public function getBusIDs():array{
        return $this->buses->pluck('id')->toArray();
    }
}
