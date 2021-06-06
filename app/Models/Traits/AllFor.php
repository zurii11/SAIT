<?php

namespace App\Models\Traits;

trait AllFor
{
    public function scopeAllForCompany($query)
    {
        return $query -> where('company_id', auth()->user()->company_id);
    }

    public function scopeAllForCashRegister($query)
    {
        return $query -> where('cash_register_id', auth()->user()->cash_register_id);
    }
}
