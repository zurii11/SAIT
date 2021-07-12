<template>
    <div id="app"  class="p-6 bg-white border-b border-gray-200">
        <form method="post" class="w-full" @submit.prevent="submit">

            <div class="flex space-x-4 mb-5">
                <input id="all" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent" @click="selectAll"/>
                <label for="all">ყველას მონიშვნა</label>


                <input id="monday" name="days[]" type="checkbox" value="1" class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="monday">ორშაბათი</label>

                <input id="tuesday" name="days[]" type="checkbox" value="2"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="tuesday">სამშაბათი</label>

                <input id="wednesday" name="days[]" type="checkbox" value="3"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="wednesday">ოთხშაბათი</label>

                <input id="thursday" name="days[]" type="checkbox" value="4"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="thursday">ხუთსაბათი</label>

                <input id="friday" name="days[]" type="checkbox" value="5"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="friday">პარასკევი</label>

                <input id="saturday" name="days[]" type="checkbox" value="6"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="saturday">შაბათი</label>


                <input id="sunday" name="days[]" type="checkbox" value="0"  class="appearance-none checked:bg-blue-600 checked:border-transparent weekday" v-model="form.days"/>
                <label for="sunday">კვირა</label>

            </div>
            <table class="w-full table-auto whitespace-no-wrap">
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
                    <tr v-for="(item, index) in form.schedules" :key="index">
                        <td class="px-4 py-3">
                            <input id="time_start" type="time" v-bind:name="'schedule[' + index + '][start_time]'" required v-model="item.start_time"/>
                        </td>
                        <td class="px-4 py-3">
                            <input id="interval_check" type="checkbox"  v-bind:name="'schedule[' + index + '][interval_check]'" class="appearance-none checked:bg-blue-600 checked:border-transparent" v-model="item.interval_check"/>
                        </td>
                        <td class="px-5 py-3" >
                            <select v-bind:name="'schedule[' + index + '][interval]'" v-if="item.interval_check" v-bind:required="item.interval_check" v-model="item.interval">
                                <option value="15">15 წუთი</option>
                                <option value="30">30 წუთი</option>
                                <option value="60">1 საათი</option>
                                <option value="90">1 საათი 30 წუთი</option>
                                <option value="120">2 საათი</option>
                            </select>
                        </td>
                        <td class="px-4 py-3">
                            <input id="time_end" type="time" v-bind:name="item.end_time" v-if="item.interval_check" v-bind:required="item.interval_check" v-model="item.end_time"/>
                        </td>
                        <td>
                            <button class="inline-flex ml-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" @click="removeField">
                                წაშლა
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" class="inline-flex ml-1 px-3 py-1 p-5 mt-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green" @click="addNewField"> 
                                გასვლის დამატება
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="mt-3 px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                დამატება
            </button>
        </form>
    </div>
</template>

<script>
export default {
    props: ['routeId', 'companyId'],
    data() {
        return {
            allSelected: false,
            form: new Form({
                days: [
                    
                ],
                schedules: [
                    { 
                        start_time: null,
                        end_time: null,
                        interval_check: false,
                        interval: null
                    }
                ],
                company_id: this.companyId,
                route_id: this.routeId
            })
        }
    },
    mounted() {
         console.log(this.routeId)
    },
    methods:
        {
            selectAll() {
                this.selectall = !this.selectall

                const weekDaycheckboxes = document.querySelectorAll('.weekday');
                [...weekDaycheckboxes].map((el) => {
                    el.checked = this.selectall;
                    if (el.checked) {
                        this.form.days.push(el.value)
                    } else {
                        const index = this.form.days.indexOf(el.value);
                        if (index > -1) {
                            this.form.days.splice(index, 1);
                        }
                    }
                }) 
            },

            addNewField() {
                this.forml.schedules.push(                    { 
                        start_time: null,
                        end_time: null,
                        interval_check: false,
                        interval: null
                    });
            },
            removeField(index) {
                    if (this.form.schedules.length === 1) {
                        return
                    }
                    this.form.schedules.splice(index, 1);
            },
            async submit() {
                try {
                    const response = await this.form.post('/routes/1/schedules');
                    window.href.url = `/routes/${this.routeId}/schedules`;
                } catch (error) {
                    console.log(this.form.errors.all())

                }
            }
        }
}
</script>