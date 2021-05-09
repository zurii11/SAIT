<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();

        return view('stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stations.create');
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
            "code" => "min:1|max:7|required|unique:stations,code",
            "company_id" => "required|int"
        ]);

        Station::create($validated);

        return redirect('stations')->with('message', 'მძღოლი წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return view('stations.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\station $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        return view('stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Station $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        $validated = $this->validate($request, [
            "name" => "min:2|max:40|required",
            "code" => "min:1|max:7|required|unique:stations,code",
            "company_id" => "required|int"
        ]);

        $station->update($validated);

        return back()->with('message', 'წარმატებული განახლება');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
