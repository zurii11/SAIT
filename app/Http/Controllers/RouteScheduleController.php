<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteScheduleRequest;
use App\Models\Route;
use App\Models\Schedule;
use App\Http\Services\RouteScheduleService;

class RouteScheduleController extends Controller
{
    private $routeScheduleService;

    public function __construct(RouteScheduleService $service)
    {
        $this->routeScheduleService = $service;
    }

    public function index(Route $route)
    {
        $schedules = Schedule::where([
            "route_id" => $route->id,
            "company_id" => $route->company_id
        ])->get();

        return view('routeSchedules.index', compact(['route','schedules']));
    }

    public function show(Route $route, Schedule $schedule)
    {
        return view('routeSchedules.show', compact('route'));
    }


    public function create(Route $route)
    {
        return view('routeSchedules.create', compact('route'));
    }

    public function store(Route $route, RouteScheduleRequest $request)
    {
        $validated = $request->validated();
        $this->routeScheduleService->createScheduleForRoute($validated);
        return redirect()->route('routes.schedules.index', $route->id);
    }
}
