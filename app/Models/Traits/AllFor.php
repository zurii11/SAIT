<?php

namespace App\Models\Traits;

trait AllFor
{
    public function scopeAllForCompany($query, $company_id = null)
    {
        $company_id = $company_id ?? auth()->user()->company_id;

        return $query -> where('company_id', $company_id);
    }

    public function scopeAllForCashRegister($query, $cash_register_id = null)
    {
        $cash_register_id = $cash_register_id ?? auth()->user()->cash_register_id;

        return $query -> where('cash_register_id', $cash_register_id);
    }
}
