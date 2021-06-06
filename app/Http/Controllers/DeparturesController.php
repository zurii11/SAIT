<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use App\Models\Departure;
use App\Models\Route;
use App\Models\Station;
use Illuminate\Http\Request;

class DeparturesController extends Controller
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
        $routes = Route::allForCompany()->get();

        $departures = Departure::orderBy('date', 'ASC')
            ->orderBy('start_time', 'ASC')
            ->get();

        return view('departures.index', compact(['departures', 'routes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //todo: if cashier is logged in - show only assigned routes. if super admin get show all routes
        $routes = Route::allForCompany()->get();

        return view('departures.create', compact(['routes']));
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
            "route_id" => "required|exists:routes,id",
            "date" => "required|date",
            "start_time" => "required|date_format:H:i",
        ]);

        Departure::create($validated);

        return redirect()->back()->with('message', 'გასვლა წარმატებით დაემატა');
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