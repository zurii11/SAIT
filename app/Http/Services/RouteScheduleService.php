<?php

namespace App\Http\Services;

use App\Constants;
use App\Models\Schedule;
use App\Models\Route;
use Illuminate\Database\Eloquent\Collection;

class RouteScheduleService
{

    public function createScheduleForRoute($scheduleDto): array
    {
        $daysDtos = $scheduleDto["days"];
        $timesDtos = $scheduleDto["schedule"];
        $models = [];
        $times = [];
        foreach ($daysDtos as $daysDto) {
            foreach ($timesDtos as $timesDto) {
                if (array_key_exists("interval_check", $timesDto) && $timesDto["interval_check"]) {
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
                $models[] = Schedule::firstOrCreate([
                    "company_id" => $scheduleDto["company_id"],
                    "route_id" => $scheduleDto["route_id"],
                    "week_day" => $daysDto,
                    "start_time" => date("H:i", $time["start_time"]),
                ]);
            }
        }
        return $models;
    }

    public function groupScheduleByWeekDay(Collection $schedules)
    {
        $groupedSchedules = [];
        foreach (Constants::WEEK_DAY_KEYS as $weekDayKey) {
            $groupedSchedules[$weekDayKey] = collect($schedules)->filter(function ($schedule) use ($weekDayKey) {
                return ($schedule->week_day === $weekDayKey);
            })->sortBy('start_time');
        }
        $groupedSchedules = collect($groupedSchedules)->reject(function ($groupedSchedule) {
            return count($groupedSchedule) === 0;
        });
        return $groupedSchedules;
    }

//    public function getSchedulesForRoute(Route $route)
//    {
//        $schedules = $route -> schedules;
//
//        $schedulesByTime = [];
//
//        foreach ($schedules as $schedule) {
//            $schedulesByTime[$schedule['start_time']][] = $schedule;
//        }
//
//        ksort($schedulesByTime);
//
//        foreach ($schedulesByTime as $key => $scheduleByTime) {
//            $days = array_column($scheduleByTime, 'week_day');
//            foreach (array_diff(Constants::WEEK_DAY_KEYS, $days) as $missingDay) {
//                $scheduleByTime[] = new Schedule(['week_day' => $missingDay, 'start_time' => ""]);
//            }
//            usort($scheduleByTime, array($this, 'sortByWeekDay'));
//            $schedulesByTime[$key] = $scheduleByTime;
//        }
//
//        return $schedulesByTime;
//    }
//
//    private function sortByWeekDay(Schedule $a, Schedule $b)
//    {
//        if ($a['week_day'] == $b['week_day']) {
//            return 0;
//        }
//        return ($a['week_day'] < $b['week_day']) ? -1 : 1;
//    }
}
