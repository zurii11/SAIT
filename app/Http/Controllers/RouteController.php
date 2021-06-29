<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use App\Models\Route;
use App\Models\RouteStop;
use App\Models\Station;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the re
     *
     * source.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::allForCompany()->with('routeStops.stopStation')->get();

        return view('routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cash_registers = CashRegister::allForCompany()->get();
        $stations = Station::allForCompany()->get();

        return view('routes.create', compact(['stations','cash_registers']));
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
            "cash_register_id" => "required|exists:cash_registers,id",
            "start_station_id" => [
                "required",
                "exists:stations,id",
            ],
            "company_id" => "required|exists:companies,id"
        ]);

        //Todo: more validation

        $route = Route::create($validated);

        foreach ($request['stop_station_id'] as $key => $stop_station_id) {
            if ($stop_station_id === null) {
                continue;
            }

            $array = [
                'route_id' => $route->id,
                'station_id' => $stop_station_id,
                'price' => $request['stop_station_id'][$key],
                'main' => ($key === 0),
            ];

            RouteStop::create($array);
        }

        return redirect('routes')->with('message', 'ხაზი წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\route $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        return view('routes.edit', compact('route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Route $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        $validated = $this->validate($request, [
            '' => ''
        ]);

        $route->update($validated);

        return back()->with('message', 'წარმატებული განახლება');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
