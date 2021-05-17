<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public static function allForCompany($company_id) {
        return static::where('company_id', $company_id) -> get();
    }
}
