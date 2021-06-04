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
                            <div class="flex">
                            @foreach($weekSchedules as $schedule)
                                <span class="flex ml-1 px-4 py-3 text-sm font-semibold bg-gray-100">
                                    <span>{{$schedule->start_time}}</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
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
