<?php

namespace App\Http\Services;

use App\Models\Schedule;

class RouteScheduleService
{

    public function createScheduleForRoute($scheduleDto) : array
    {
        $daysDtos = $scheduleDto["days"];
        $timesDtos = $scheduleDto["schedule"];
        $models= [];
        foreach ($daysDtos as $key => $value) {
            if ($value == "on") {
                foreach($timesDtos as $value) {
                    $times = [];
                    if (in_array("interval_check", $value) && $value["interval_check"]) {
                        $start_time = strtotime($value["start_time"]);
                        $end_time = strtotime($value["end_time"]);
                        while ($start_time < $end_time) {
                            array_push($times, ["start_time" => $start_time]);
                            $start_time += $value["interval"] * 60;
                          }
                    } else {
                        array_push($times, ["start_time" => strtotime($value["start_time"])]);
                    }
                }
                foreach($times as $value) {
                    array_push($models, Schedule::create([
                        "company_id" => $scheduleDto["company_id"],
                        "route_id" => $scheduleDto["route_id"],
                        "week_day" =>$key + 1,
                        "start_time" => date("H:i", $value["start_time"]),
                    ]));
                }
            }
        }
        return $models;
    }
}
