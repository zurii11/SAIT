<?php

namespace App\Models\Traits;

trait AllForCompany
{
    public function scopeAllForCompany($query)
    {
        return $query -> where('company_id', auth()->user()->company_id);
    }
}
