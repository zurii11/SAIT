<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('სალაროს დამატება') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('cash-register.store')}}">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div>
                <x-label for="number" class="mt-1" :value="__('სალაროს ნომერი')" />
                <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus />
            </div>

            <x-button>
                დამატება
            </x-button>
        </form>
    </div>
</x-app-layout>

