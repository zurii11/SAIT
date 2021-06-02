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
        <form method="post" action="{{route('routes.schedules.store', $route->id)}}" class="w-full">
            @csrf
            @method('post')
            <input type="hidden" name="company_id" value="{{auth()->user()->company_id}}">
            <input type="hidden" name="route_id" value="{{$route->id}}">

            <div class="flex space-x-4 mb-5" x-data="selectAllData()">
                <x-input id="all" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" @click="toggleAllCheckboxes()" />
                <x-label for="all" value="ყველას მონიშვნა" />

                <x-input id="monday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" />
                <x-label for="monday" value="ორშაბათი" />

                <x-input id="tuesday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
                <x-label for="tuesday" value="სამშაბათი" />

                <x-input id="wednesday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
                <x-label for="wednesday" value="ოთხშაბათი" />

                <x-input id="thursday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
                <x-label for="thursday" value="ხუთსაბათი" />

                <x-input id="friday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
                <x-label for="friday" value="პარასკევი" />

                <x-input id="saturday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
                <x-label for="saturday" value="შაბათი" />

                <x-input id="sunday" name="days[]" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
                <x-label for="sunday" value="კვირა" />
            </div>
            <table x-data="addNewSchedule()" class="table-fixed table-auto whitespace-no-wrap">
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <template x-for="(item, index) in schedules" :key="index">
                        <!-- You can also reference "index" inside the iteration if you need. -->
                        <tr>
                            <td class="w-1/6">
                                <div class="flex space-x-4">
                                    <x-label for="time_start" value="გასვლის დრო" class="text-gray-500 font-bold inline-block align-middle" />
                                    <x-input id="time_start" type="time" x-bind:name="'schedule[' + index + '][start_time]'" required/>
                                </div>
                            </td>
                            <td class="w-1/6">
                                <div class="flex space-x-4" >
                                    <x-input id="interval_check" type="checkbox"  x-bind:name="'schedule[' + index + '][interval_check]'" class="appearance-none checked:bg-blue-600 checked:border-transparent" @click="item.hasInterval = !item.hasInterval " />
                                    <x-label for="interval_check" value="აქვს ინტერვალი" />
                                </div>
                            </td>
                            <td class="w-1/6">
                                <div class="flex space-x-4" x-show="item.hasInterval">
                                    <x-select x-bind:name="'schedule[' + index + '][interval]'" x-bind:required="item.hasInterval">
                                        <option value="">{{__('აირჩიეთ...')}}</option>
                                        <option value="15">{{__('15 წუთი')}}</option>
                                        <option value="30">{{__('30 წუთი')}}</option>
                                        <option value="60">{{__('1 საათი')}}</option>
                                        <option value="90">{{__('1 საათი 30 წუთი')}}</option>
                                        <option value="120">{{__('2 საათი')}}</option>
                                    </x-select>
                                    <x-label for="interval" value="ინტერვალი" />
                                </div>
                            </td>
                            <td  class="w-1/6">
                                <div class="flex space-x-4" x-show="item.hasInterval">
                                    <x-label for="time_end" value="ბოლო გასვლის დრო" class="text-gray-500 font-bold"/>
                                    <x-input id="time_end" type="time" x-bind:name="'schedule[' + index + '][end_time]'" x-bind:required="item.hasInterval"/>
                                </div>
                            </td>
                            <td  class="w-1/6">
                                <button x-bind:active="!item.hasInterval" @click="removeField()" class="inline-flex ml-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                                    წაშლა
                                </button>
                            </td>
                        </tr>
                    </template>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button x-bind:active="!item.hasInterval" @click="addNewField()" class="inline-flex ml-1 px-3 py-1 p-5 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                გასვლის დამატება
                            </button>
                        </td>
                    </tr>  
                </tbody> 
            </table>
            <x-button>
                {{__('დამატება')}}
            </x-button>
        </form>
    </div>
</x-app-layout>

