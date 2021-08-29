<?php

namespace App\Http\Controllers;

use App\Http\Resources\SearchResource;
use App\Models\Departure;
use App\Models\Route;
use App\Models\Station;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;
use \ReflectionClass;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        $tickets = $request->tickets;
        $startStation = $request->startStation;
        $stopStation = $request->stopStation;

        // $model = Departure::with('route.routeStops.stopStation')->with('route.startStation')->get()->where('date', $date)->where('start_time', $time)->where('route.id', $startStation);
        // $model = Departure::where('date', $date)->with(
        //     'route.startStation',
        //     'route.routeStops.stopStation'
        // )->where('route.id', $startStation)->get();
        $model = Departure::with(
            'route.startStation',
            'route.routeStops.stopStation',
            'tickets'
        )->get()->where('date', $date)->where('route.startStation.name', $startStation)->toArray();

        $results = array();

        foreach ($model as $departure) {
            foreach ($departure['route']['route_stops'] as $stop) {
                if ($stop['stop_station']['name'] == $stopStation) {
                    $departure['searched_stop'] = $stopStation;
                    $departure['sellLimit'] = 18;
                    $departure['price'] = $stop['price'];
                    if (($departure['sellLimit'] - count($departure['tickets'])) >= $tickets) {
                        $departure['soldTickets'] = count($departure['tickets']);
                        $departure['ticketsLeft'] = $departure['sellLimit'] - $departure['soldTickets'];
                        array_push($results, $departure);
                    }
                }
            }
        }

        // return $results;
        return SearchResource::collection(collect($results));
    }

    public function getStations()
    {
        return Station::all();
    }
}
