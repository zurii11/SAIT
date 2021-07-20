<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashRegister extends Model
{
    use HasFactory;
    use AllFor;

    protected $fillable = [
        'number',
        'company_id'
    ];


    public function departures()
    {
        return $this->hasManyThrough(Departure::class, Route::class);
    }
}
