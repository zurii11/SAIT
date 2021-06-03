<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('სამარშრუთო ხაზები დამატება') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('routes.store')}}">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div>
                <x-label for="cash_register_id" class="mt-4" :value="__('სალაროს #')" />
                <x-select name="cash_register_id" >
                    <option value="">{{__('აირჩიეთ...')}}</option>
                    @foreach($cash_registers as $cash_register)
                        <option value="{{$cash_register->id}}">{{$cash_register->number}}</option>
                    @endforeach
                </x-select>
            </div>
            <div>
                <x-label for="start_station_id" class="mt-4" :value="__('საწყისი სადგური')" />
                <x-select name="start_station_id">
                    <option value="">{{__('აირჩიეთ...')}}</option>
                    @foreach($stations as $station)
                        <option value="{{$station->id}}">{{$station->name . '-' . $station->code}}</option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-label for="stop_station_id" class="mt-4" :value="__('საბოლოო სადგური')" />
                <x-select name="stop_station_id">
                    <option value="">{{__('აირჩიეთ...')}}</option>
                    @foreach($stations as $station)
                        <option value="{{$station->id}}">{{$station->name . '-' . $station->code}}</option>
                    @endforeach
                </x-select>
            </div>


            <div>
                <x-label for="price" class="mt-3" :value="__('ფასი')" />
                <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
            </div>


            <x-button>
                {{__('დამატება')}}
            </x-button>
        </form>
    </div>
</x-app-layout>

