<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function scopeAllByCompany($query, $company_id) {
        return $query -> where('company_id', $company_id);
    }
}
