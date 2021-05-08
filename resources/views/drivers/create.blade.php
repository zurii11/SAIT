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
            <label class="block text-sm mt-3">
                <span class="text-gray-700 dark:text-gray-400">{{__('სახელი')}}</span>
                <input name="name" id="name" class="block border w-full mt-1 p-3 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="სახელი">
            </label>

            <label class="block text-sm mt-3">
                <span class="text-gray-700 dark:text-gray-400">{{__('გვარი')}}</span>
                <input name="surname"  id="surname" class="block border w-full mt-1 p-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="სახელი">
            </label>

            <label class="block text-sm mt-3">
                <span class="text-gray-700 dark:text-gray-400">{{__('ტელეფონის ნომერი')}}</span>
                <input name="phone_number"  id="phone_number" class="block  border w-full mt-1 p-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="სახელი">
            </label>

            <button type="submit" class="mt-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                დამატება
            </button>
        </form>
    </div>
</x-app-layout>

