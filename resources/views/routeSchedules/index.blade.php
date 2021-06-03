<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$route->stopStation->name}} განრიგი
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ორშაბათი</th>
                        <th class="px-4 py-3">სამშაბათი</th>
                        <th class="px-4 py-3">ოთხშაბათი</th>
                        <th class="px-4 py-3">ხუთსაბათი</th>
                        <th class="px-4 py-3">პარასკევი</th>
                        <th class="px-4 py-3">შაბათი</th>
                        <th class="px-4 py-3">კვირა</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach($schedules as $schedule)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-semibold">
                                {{$schedule->start_time}}
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold">
                                {{$schedule->week_day}}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
