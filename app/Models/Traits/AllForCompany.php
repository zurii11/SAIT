<?php

namespace App\Models\Traits;

trait AllForCompany
{
    public function scopeAllByCompany($query)
    {
        return $query -> where('company_id', auth()->user()->company_id);
    }
}
