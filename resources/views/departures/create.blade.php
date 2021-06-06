<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('გასვლის დამატება') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('departures.store')}}">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div>
                <x-label for="route_id" class="mt-4" :value="__('საწყისი სადგური')" />
                <x-select name="route_id">
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


            <x-button>
                {{__('დამატება')}}
            </x-button>
        </form>
    </div>
</x-app-layout>
