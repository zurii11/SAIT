<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$route->startStation->name}} - {{$route->routeMainStop()}} განრიგი
        </h2>
    </x-slot>

    @include('routeSchedules.create-schedule-form')

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="w-full rounded-lg shadow-xs">
            <div class="w-full">

                    @foreach($schedulesGroupedByWeek as $weekDayKey => $weekSchedules)
                        <div class="flex border-b border-gray-200 py-4">
                            <div class="w-1/12 font-bold mt-2">{{$weekDays[$weekDayKey]}}</div>
                            <div class="flex flex-wrap w-11/12">
                            @foreach($weekSchedules as $schedule)
                                <span class="schedule-{{$schedule->id}} flex ml-1 mt-1 px-4 py-2 text-sm font-semibold bg-gray-100">
                                    <span>{{$schedule->start_time}}</span>
                                    <span onclick="removeTime('{{$schedule->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 ml-2 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
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

    <x-slot name="footer">
        <script type="application/javascript">
            function removeTime(scheduleId){
                if(confirm('ნამდვილად გსურთ ჩანაწერის წაშლა?')){
                    axios
                        .put(`/ajax/route/schedule/disable/${scheduleId}`).then(({data}) => {
                        document.getElementsByClassName("schedule-" + scheduleId)[0].style.display = "none";;
                    }).catch((error) => {
                        alert('დაფიქსირდა შეცდომა!');
                    });
                }

            }
        </script>
    </x-slot>

</x-app-layout>
