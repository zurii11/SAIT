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
        $timesDtos = $scheduleDto["schedules"];
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
}
