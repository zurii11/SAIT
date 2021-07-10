<?php

namespace App\Http\Controllers;

use App\Models\CashRegister;
use App\Models\Departure;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Station;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
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

            $routes = (auth()->user()->cash_register_id === null)
                ? Route::allForCompany()->get()
                : Route::allForCashRegister()->get();


        $departures = Departure::where('date', '=', date('Y-m-d'))->with([
            'route.startStation',
            'route.routeStops.stopStation',
            'busDriver.bus',
            'busDriver.driver',
            ])
            ->where('start_time', '>', date('H:i:s'))
            ->orderBy('date', 'ASC')
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

    public function attachBusDriver(Departure $departure, Request $request)//: JsonResponse
    {
        $driverId = $request->get('driverId');
        $busId = $request->get('busId');

        $this->validate($request, [
            'busId' => 'required|int',
            'driverId' => 'required|int',
        ]);


        $driver = Driver::find($driverId);

        //get if bus is already attached to the driver
        $bus = $driver->buses()->wherePivot('bus_id', $busId)->first();

        $busDriverId = $bus->pivot->id;

        $departure->buses_drivers_id = $busDriverId;
        $departure->save();

        return response()->json('success', 200);
    }



    /**
     * @param  Departure
     * @return \Illuminate\Http\Response
     */
    public function loadDepartureData(Departure $departure)
    {
        $tickets = $departure->tickets();
        $soldOutTicketCount = $tickets->count();

        $departure->load([
            'route.startStation',
            'route.routeStops.stopStation',
            'busDriver.bus',
            'busDriver.driver',
            'tickets.customer'
        ]);

        $data['soldOutTicketCount'] = $soldOutTicketCount;
        $data['sellLimit'] = 18;
        $data['departure'] = $departure; //eager Loaded

        return response()->json($data, 200);
    }



    /**
    * @param  Departure
    * @return \Illuminate\Http\Response
    */
    public function sellTickets(Request $request, Departure $departure)
    {

        $this->validate($request, [
            'departureID' => 'required|int',
            'finalStop' => 'required|int',
            'ticketAmount' => 'required|int',
        ]);

        $ticketAmount = request()->get('ticketAmount');
        $departureId = request()->get('departureID');
        $routeStopId = request()->get('finalStop');


        for ($i = 0; $i <= $ticketAmount; $i++) {
            Ticket::create([
                'departure_id' => $departureId,
                'route_stop_id' => $routeStopId,
            ]);
        }

        return response()->json('success', 200);
    }
}
