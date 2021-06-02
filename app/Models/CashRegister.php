<?php

namespace App\Models;

use App\Models\Traits\AllForCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashRegister extends Model
{
    use HasFactory;
    use AllForCompany;

    protected $primaryKey = 'number';
    public $incrementing = false;

    protected $fillable = [
        'number',
        'company_id'
    ];
}
