<?php

namespace App\Http\Controllers;

use App\Constants;
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
        $schedules = Schedule::allForCompany()->where('route_id', $route->id)->get();
        $schedulesGroupedByWeek = $this->routeScheduleService->groupScheduleByWeekDay($schedules);
        $weekDays = Constants::WEEK_DAYS;

        return view('routeSchedules.index', compact(['route','schedulesGroupedByWeek', 'weekDays']));
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
