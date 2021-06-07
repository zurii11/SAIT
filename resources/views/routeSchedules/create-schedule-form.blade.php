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

            <x-input id="monday" name="days[]" type="checkbox" value="1" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" />
            <x-label for="monday" value="ორშაბათი" />

            <x-input id="tuesday" name="days[]" type="checkbox" value="2"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
            <x-label for="tuesday" value="სამშაბათი" />

            <x-input id="wednesday" name="days[]" type="checkbox" value="3"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
            <x-label for="wednesday" value="ოთხშაბათი" />

            <x-input id="thursday" name="days[]" type="checkbox" value="4"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
            <x-label for="thursday" value="ხუთსაბათი" />

            <x-input id="friday" name="days[]" type="checkbox" value="5"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
            <x-label for="friday" value="პარასკევი" />

            <x-input id="saturday" name="days[]" type="checkbox" value="6"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
            <x-label for="saturday" value="შაბათი" />

            <x-input id="sunday" name="days[]" type="checkbox" value="7"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday"/>
            <x-label for="sunday" value="კვირა" />
        </div>
        <table x-data="addNewSchedule()" class="w-full table-auto whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">გასვლის დრო</th>
                    <th class="px-4 py-3">აქვს ინტერვალი</th>
                    <th class="px-4 py-3">ინტერვალი</th>
                    <th class="px-4 py-3">ბოლო გასვლის დრო</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <template x-for="(item, index) in schedules" :key="index">
                    <!-- You can also reference "index" inside the iteration if you need. -->
                    <tr>
                        <td class="px-4 py-3">
                            <x-input id="time_start" type="time" x-bind:name="'schedule[' + index + '][start_time]'" required/>
                        </td>
                        <td class="px-4 py-3">
                            <x-input id="interval_check" type="checkbox"  x-bind:name="'schedule[' + index + '][interval_check]'" class="appearance-none checked:bg-blue-600 checked:border-transparent" @click="item.hasInterval = !item.hasInterval " />
                        </td>
                        <td class="px-5 py-3">
                            <x-select x-bind:name="'schedule[' + index + '][interval]'" x-bind:required="item.hasInterval" x-show="item.hasInterval">
                                <option value="">{{__('აირჩიეთ...')}}</option>
                                <option value="15">{{__('15 წუთი')}}</option>
                                <option value="30">{{__('30 წუთი')}}</option>
                                <option value="60">{{__('1 საათი')}}</option>
                                <option value="90">{{__('1 საათი 30 წუთი')}}</option>
                                <option value="120">{{__('2 საათი')}}</option>
                            </x-select>
                        </td>
                        <td class="px-4 py-3">
                            <x-input id="time_end" type="time" x-bind:name="'schedule[' + index + '][end_time]'" x-bind:required="item.hasInterval" x-show="item.hasInterval"/>
                        </td>
                        <td>
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
                        <button  type="button" @click="addNewField()" class="inline-flex ml-1 px-3 py-1 p-5 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
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
