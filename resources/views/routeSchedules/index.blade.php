<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$route->startStation->name}} - {{$route->stopStation->name}} განრიგი
        </h2>
    </x-slot>

    @include('routeSchedules.create-schedule-form')

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                    @foreach($schedulesGroupedByWeek as $weekDayKey => $weekSchedules)
                        <div class="flex border-b border-gray-200 py-4">
                            <div class="w-1/12 font-bold">{{$weekDays[$weekDayKey]}}</div>
                            <div>
                            @foreach($weekSchedules as $schedule)
                                <span class="px-4 py-3 text-sm font-semibold">
                                    {{$schedule->start_time}}
                                </span>
                            @endforeach
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
