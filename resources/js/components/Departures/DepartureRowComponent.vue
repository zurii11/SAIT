<template>
    <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3 text-lg font-semibold">
           {{departure.route.start_station.name}} - {{departure.route.stop_station.name}}
        </td>

        <td class="px-4 py-3 text-lg font-bold">
            {{departure.start_time}}
        </td>

        <td class="px-4 py-3">
            {{departure.date}}
        </td>

        <td class="text-red-300">
            არ არის მიმაგრებული
        </td>

        <td class="px-4 py-3 text-sm inline-flex">
            <a href="" class="inline-flex">
                <button @click.prevent="openModal" class="flex items-center justify-between w-full px-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    მარშუტკის დამატება
                    <span class="ml-1" aria-hidden="true">+</span>
                </button>
            </a>


            <button class="inline-flex ml-1 px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                რეისის გაუქმება
            </button>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['departure'],
    data() {
        return {

        }
    },
    mounted() {
        console.log(this.departure);
    },
    methods:
    {
        openModal(){
            this.$store.state.modalOpen = true;
        }
    }
}
</script>

<style scoped>

</style>
