<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ტრანსპორტის რედაქტირება') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('buses.update', $bus->id)}}">
            @csrf
            @method('put')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">
            <input type="hidden" name="plate_number" value="{{$bus->plate_number}}">

            <div>
                <x-label for="plate_number" class="mt-1" :value="__('საავტომობილო ნომერი')" />
                <x-input id="plate_number" disabled="disabled" class="block mt-1 w-full" type="text" name="plate_number" :value="$bus->plate_number" required />
            </div>

            <div>
                <x-label for="model" class="mt-3" :value="__('მოდელი')" />
                <x-input id="model" class="block mt-1 w-full" type="text" name="model" :value="$bus->model" required autofocus />
            </div>

            <div>
                <x-label for="color" class="mt-3" :value="__('ფერი')" />
                <x-input id="color" class="block mt-1 w-full" type="text" name="color" :value="$bus->color" required />
            </div>

            <div>
                <x-label for="seats" class="mt-3" :value="__('ადგილების რაოდენობა')" />
                <x-input id="seats" class="block mt-1 w-full" type="text" name="seats" :value="$bus->seats" />
            </div>

            <x-button>
                დამატება
            </x-button>

        </form>
    </div>
</x-app-layout>

