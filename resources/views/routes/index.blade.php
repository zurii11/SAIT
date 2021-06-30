<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('სამარშრუთო ხაზები') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="w-1/5 my-6">
            <a href="{{route('routes.create')}}">
                <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    ხაზის დამატება
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </a>
        </div>
        <div class="w-full rounded-lg shadow-xs">
            <div class="w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">სალაროს #</th>
                        <th class="px-4 py-3">საწყისი სადგური</th>
                        <th class="px-4 py-3">საბოლოო სადგური</th>
                        <th class="px-4 py-3"></th>
                        <th class="px-4 py-3"> </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach($routes as $route)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-semibold">
                                {{$route->cashRegister->number}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <a href="{{route('routes.edit', $route->id)}}">{{$route->startStation->name}} - {{$route->startStation->code}}</a>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex flex-col">
                                    @foreach($route->routeStops as $routeStop)
                                        <span @if($routeStop->main) class="font-bold" @endif>{{$routeStop->stopStation->name}} - {{$routeStop->stopStation->code}}</span>
                                    @endforeach
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm inline-flex">
                                <a href="{{ route('routes.schedules.index', $route->id) }}" class="inline-flex">
                                        <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" aria-label="Edit">
                                            განრიგები
                                        </button>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm inline-flex">
                                <form onsubmit="if(!confirm('ნამდვილად გსურთ ჩანაწერის წაშლა?')){return false;}" name="destroyRoute" action="{{ route('routes.destroy', $route->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="inline-flex ml-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                                        წაშლა
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
