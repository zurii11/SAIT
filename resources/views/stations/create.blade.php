<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('სადგურის დამატება') }}
        </h2>
    </x-slot>


    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('stations.store')}}">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div>
                <x-label for="name" class="mt-1" :value="__('სადგურის სახელი')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="code" class="mt-3" :value="__('სადგურის კოდი')" />
                <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required />
            </div>

            <x-button>
                დამატება
            </x-button>
        </form>
    </div>
</x-app-layout>

