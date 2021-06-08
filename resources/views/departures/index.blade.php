<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('რეისები') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">

        <div><example-component/>
        </div>


        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" class="flex space-x-4 " action="{{route('departures.store')}}">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div>
                <x-label for="route_id" class="mt-3 mb-1" :value="__('საწყისი სადგური')" />
                <x-select class="h-11 mt-0" name="route_id">
                    <option value="">{{__('აირჩიეთ...')}}</option>
                    @foreach($routes as $route)
                        <option value="{{$route->id}}">{{$route->startStation->name . '-' . $route->stopStation->name}}</option>
                    @endforeach
                </x-select>
            </div>


            <div>
                <x-label for="date" class="mt-3" :value="__('თარიღი')" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('price')" required />
            </div>

            <div>
                <x-label for="time" class="mt-3" :value="__('დრო')" />
                <x-input id="time" class="block mt-1 w-full" type="time" name="start_time" :value="old('price')" required />
            </div>


            <x-button class="h-11 mt-9">
                {{__('დამატება')}}
            </x-button>
        </form>
    </div>


    <div class="p-6 bg-white border-b border-gray-200">





        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ხაზი</th>
                        <th class="px-4 py-3">დრო</th>
                        <th class="px-4 py-3">თარიღი</th>
                        <th class="px-4 py-3">მძღოლი</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach($departures as $key => $departure)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-lg font-semibold">
                                {{$departure->route->startStation->name}} - {{$departure->route->stopStation->name}}
                            </td>

                            <td class="px-4 py-3 text-lg font-bold">
                                {{$departure->start_time}}
                            </td>

                            <td class="px-4 py-3">
                                {{$departure->date}}
                            </td>

                            <td class="text-red-300">
                                არ არის მიმაგრებული
                            </td>

                            <td class="px-4 py-3 text-sm inline-flex">
                                <a href="" class="inline-flex">
                                    <button class="flex items-center justify-between w-full px-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        მარშუტკის დამატება
                                        <span class="ml-1" aria-hidden="true">+</span>
                                    </button>
                                </a>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex ml-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                                        რეისის გაუქმება
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
