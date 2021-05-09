<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::all();

        return view('buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buses.create');
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
            "model" => "min:2|max:40|required",
            "color" => "min:2|max:40|required",
            "plate_number" => "size:7|required|unique:buses,plate_number",
            "seats" => "required|int",
            "company_id" => "required|int"
        ]);

        Bus::create($validated);

        return redirect('buses')->with('message', 'ტრანსპორტი წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        return view('buses.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        $validated = $this->validate($request, [
            "model" => "min:2|max:40|required",
            "color" => "min:2|max:40|required",
            "plate_number" => "size:7|required",
            "seats" => "required|int",
            "company_id" => "required|int"
        ]);

        $bus->update($validated);

        return back()->with('message', 'წარმატებული განახლება');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();

        return back()->with('message', 'წაიშალა წარმატებულად');
    }
}
