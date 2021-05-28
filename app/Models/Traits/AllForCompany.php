<?php

namespace App\Models\Traits;

trait AllForCompany
{
    public function scopeAllByCompany($query, $company_id)
    {
        return $query -> where('company_id', $company_id);
    }
}
