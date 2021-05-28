<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buses = Bus::all();
        return view('drivers.create', compact('buses'));
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
            "name" => "min:2|max:40|required",
            "surname" => "min:2|max:40|required",
            "phone_number" => "min:9|max:13|required|unique:drivers,phone_number",
            "company_id" => "required|int"
        ]);

        $driver = Driver::create($validated);

        if ($driver->wasRecentlyCreated) {
            $busesToAttach = $request->get('bus_id');

            $driver->buses()->sync($busesToAttach);
        }

        return redirect('drivers')->with('message', 'მძღოლი წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $buses = Bus::all();

        return view('drivers.edit', compact('driver', 'buses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $validated = $this->validate($request, [
            "name" => "min:2|max:40|required",
            "surname" => "min:2|max:40|required",
            "phone_number" => "min:9|max:13|required",
            "company_id" => "required|int"
        ]);

        $driver->update($validated);

        $busesToAttach = $request->get('bus_id');

        $driver->buses()->sync($busesToAttach);

        return back()->with('message', 'წარმატებული განახლება');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->buses()->detach();
        $driver->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
