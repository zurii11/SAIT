<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::IsCashier()->with('cashRegister')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cashRegisters = CashRegister::all();
        return view('users.create', compact('cashRegisters'));
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
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', __('მოლარე წაიშალა წაიშალა'));
    }
}
