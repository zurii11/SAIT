<?php

namespace App\Models;

use App\Models\Traits\AllForCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    use AllForCompany;

    protected $fillable = [
        'name',
        'code',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
