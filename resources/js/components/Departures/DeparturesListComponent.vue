<template>
    <table class="w-full whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">ხაზი</th>
            <th class="px-4 py-3">დრო</th>
            <th class="px-4 py-3">თარიღი</th>
            <th class="px-4 py-3">ტრანსპორტი</th>
            <th class="px-4 py-3"></th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr v-for="departure in this.departures" class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-lg flex font-semibold">
                    <span>{{departure.route.start_station.name}} - </span>
                    <span class="flex flex-col">
                        <span v-for="routeStop in departure.route.route_stops.filter(routeStop => routeStop.main)"> {{routeStop.stop_station.name}}</span>
                    </span>

                </td>

                <td class="px-4 py-3 text-lg font-bold">
                    {{departure.start_time}}
                </td>

                <td class="px-4 py-3">
                    {{departure.date}}
                </td>

                <td>
                    <div v-if="departure.bus_driver === null" class="text-red-300">
                        არ არის მიმაგრებული
                    </div>
                    <div v-if="departure.bus_driver !== null">
                        <span>{{departure.bus_driver.bus.plate_number}}</span>
                        <span>{{departure.bus_driver.driver.name}} {{departure.bus_driver.driver.surname}}</span>
                    </div>


                </td>

                <td class="px-4 py-3 text-sm inline-flex">
                    <a href="" class="inline-flex">
                        <button @click.prevent="openModal(departure.id)" class="flex items-center justify-between w-full px-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            მარშუტკის დამატება
                            <span class="ml-1" aria-hidden="true">+</span>
                        </button>
                    </a>


                    <button @click.prevent="openTicketsModal(departure.id)" class="inline-flex ml-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-red-600 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                        ბილეთები
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: ['departures'],
    data() {
        return {

        }
    },
    mounted() {

    },
    methods:
        {
            openModal(departureId){
                this.$store.state.modalOpen = true;
                this.$store.state.currentDepartureId = departureId;
            },

            openTicketsModal(departureId){
                this.$store.state.modalTicketOpen = true;
                this.$store.state.currentDepartureId = departureId;
            }
        }
}
</script>

<style scoped>

</style>
