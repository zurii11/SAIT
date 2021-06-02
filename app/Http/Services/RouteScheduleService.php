<?php

namespace App\Http\Services;

use App\Models\Schedule;
use App\Models\Route;

class RouteScheduleService
{
    private static $WEEK_DAY_KEYS = ["1" ,"2", "3", "4", "5", "6", "7"];

    public function createScheduleForRoute($scheduleDto): array
    {
        $daysDtos = $scheduleDto["days"];
        $timesDtos = $scheduleDto["schedule"];
        $models = [];
        foreach ($daysDtos as $key => $value) {
            if ($value == "on") {
                foreach ($timesDtos as $value) {
                    $times = [];
                    if (array_key_exists("interval_check", $value) && $value["interval_check"]) {
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
                foreach ($times as $value) {
                    array_push($models, Schedule::firstOrCreate([
                        "company_id" => $scheduleDto["company_id"],
                        "route_id" => $scheduleDto["route_id"],
                        "week_day" => $key + 1,
                        "start_time" => date("H:i", $value["start_time"]),
                    ]));
                }
            }
        }
        return $models;
    }

    public function getSchedulesForRoute(Route $route)
    {
        $schedules = $route -> schedules;

        $schedulesByTime = [];

        foreach ($schedules as $schedule) {
            $schedulesByTime[$schedule['start_time']][] = $schedule;
        }

        ksort($schedulesByTime);

        foreach ($schedulesByTime as $key => $scheduleByTime) {
            $days = array_column($scheduleByTime, 'week_day');
            foreach (array_diff(self::$WEEK_DAY_KEYS, $days) as $missingDay) {
                array_push($scheduleByTime, new Schedule(['week_day' => $missingDay, 'start_time' => ""]));
            }
            usort($scheduleByTime, array($this, 'sortByWeekDay'));
            $schedulesByTime[$key] = $scheduleByTime;
        }

        return $schedulesByTime;
    }

    private function sortByWeekDay(Schedule $a, Schedule $b)
    {
        if ($a['week_day'] == $b['week_day']) {
            return 0;
        }
        return ($a['week_day'] < $b['week_day']) ? -1 : 1;
    }
}
