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
        $startStation = $request->startStation;
        $stopStation = $request->stopStation;

        $model = Departure::with('route.routeStops.stopStation')->with('route.startStation')->get()->where('date', $date)->where('start_time', $time)->where('route.id', $startStation);
        $model1 = Route::with('routeStops')->get();

        // dd($model);
        return json_encode($model);
        // return SearchResource::collection($model);
    }
}
