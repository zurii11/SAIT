<?php

namespace App\Http\Services;

use App\Models\Schedule;

class RouteScheduleService
{

    public function createScheduleForRoute($scheduleDto): array
    {
        $daysDtos = $scheduleDto["days"];
        $timesDtos = $scheduleDto["schedule"];
        $models = [];
        foreach ($daysDtos as $key => $value) {
            if ($value === "on") {
                foreach ($timesDtos as $timesDto) {
                    $times = [];
                    if (in_array("interval_check", $timesDto) && $timesDto["interval_check"]) {
                        $start_time = strtotime($timesDto["start_time"]);
                        $end_time = strtotime($timesDto["end_time"]);
                        while ($start_time < $end_time) {
                            $times[] = ["start_time" => $start_time];
                            $start_time += $timesDto["interval"] * 60;
                        }
                    } else {
                        $times[] = ["start_time" => strtotime($timesDto["start_time"])];
                    }
                }
                foreach ($times as $time) {
                    $models[] = Schedule::create([
                        "company_id" => $scheduleDto["company_id"],
                        "route_id" => $scheduleDto["route_id"],
                        "week_day" => $key + 1,
                        "start_time" => date("H:i", $time["start_time"]),
                    ]);
                }
            }
        }
        return $models;
    }
}
