<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$route->stops()}} განრიგის დამატება 
        </h2>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-400">{{ $error }}</p>
            @endforeach
        @endif
        <form method="post" action="{{route('routes.schedules.store', $route->id)}}" class="w-full max-w-sm">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">

            <div class="flex space-x-4 mb-4">
                <x-input id="all" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="all" value="ყველა" />

                <x-input id="monday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="monday" value="ორშაბათი" />

                <x-input id="tuesday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="tuesday" value="სამშაბათი" />

                <x-input id="wednesday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="wednesday" value="ოთხშაბათი" />

                <x-input id="thursday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="thursday" value="ხუთსაბათი" />

                <x-input id="friday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="friday" value="პარასკევი" />

                <x-input id="saturday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="saturday" value="შაბათი" />

                <x-input id="sunday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent"/>
                <x-label for="sunday" value="კვირა" />
            </div>

            <div class="flex space-x-4 mb-4">
                <div class="md:w-1/3">
                    <x-label for="time_start" value="გასვლის დრო" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"/>
                </div>
                <div class="md:w-2/3">
                    <x-input id="time_start" class="block mt-1" type="time" name="schedule[0][time_start]" required />
                </div>
                <div class="md:w-2/3">
                    <x-input id="time_start" class="block mt-1" type="time" name="schedule[0][time_end]" required />
                </div>
                <div class="md:w-2/3">
                    <x-input id="time_start" class="block mt-1" type="time" name="schedule[1][time_start]" required />
                </div>

            </div>
            <x-button>
                {{__('დამატება')}}
            </x-button>
        </form>
    </div>
</x-app-layout>

