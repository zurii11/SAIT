<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashRegisters = CashRegister::orderBy('number')->get();

        return view('cash-register.index', compact('cashRegisters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cash-register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $this->validate($request, [
            "number" => "required|unique:cash_registers|int",
            "company_id" => "required|int"
        ]);

        CashRegister::create($validated);

        return redirect('cash-register')->with('message', 'მძღოლი წარმატებით დაემატა');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashRegister $cashRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashRegister $cashRegister)
    {
        $cashRegister->delete();

        return back()->with('message', __('სალარო წაიშალა'));
    }
}
