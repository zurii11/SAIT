<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('მძღოლის დამატება') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('drivers.store')}}">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div>
                <x-label for="name" class="mt-1" :value="__('სახელი')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="surname" class="mt-3" :value="__('გვარი')" />
                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
            </div>

            <div>
                <x-label for="phone_number" class="mt-3" :value="__('ტელეფონის ნომერი')" />
                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
            </div>

            <div>
                <x-label for="phone_number" class="mt-3" :value="__('დაამატე ავტომობილი')" />
                <x-select name="bus_id[]" multiple>
                    <option value="">{{__('აირჩიეთ...')}}</option>
                    @foreach($buses as $bus)
                        <option value="{{$bus->id}}">{{$bus->plate_number}}</option>
                    @endforeach
                </x-select>
            </div>

            <x-button>
                {{__('დამატება')}}
            </x-button>
        </form>
    </div>
</x-app-layout>

