<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteScheduleRequest;
use App\Models\Route;
use App\Models\Schedule;


class RouteScheduleController extends Controller
{
    public function show(Route $route, Schedule $scheduel)
    {
        return view('routes.show', compact('route'));
    }

    
    public function create(Route $route)
    {
        return view('routeschedules.create', compact('route'));
    }

    public function store(RouteScheduleRequest $request){
        $validated = $request->validated();
        return $validated;
    }
}
