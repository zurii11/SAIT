<template>
    <div>
        <div class="relative">
            <div v-if="this.$store.state.currentDepartureId !== null" class="mt-1 relative rounded-md shadow-sm">

                <div class="pb-3 text-lg flex font-semibold">
                    <span>{{departure.route.start_station.name}} - </span>
                    <span class="flex">
                        <span class="ml-2" v-for="routeStop in departure.route.route_stops"> {{routeStop.stop_station.name}}</span>
                    </span>
                </div>


                <div class="flex mt-5">
                    <div>
                        <label for="ticket_amount">ბილეთების რაოდენობა:</label>
                        <select v-model="this.ticketAmount" id="ticket_amount" name="ticket_amount" class="">
                            <option v-for="index in this.leftTickets" v-bind:value="index">{{ index }}</option>
                        </select>
                    </div>
                    <div class="ml-3">
                        <label for="ticket_amount">გაჩერება:</label>
                        <select v-model="this.finalStop" id="final_stop" name="final_stop" class="">
                            <option class="ml-2" v-for="routeStop in departure.route.route_stops" v-bind:value="routeStop.stop_station.id"> {{routeStop.stop_station.name}}</option>
                        </select>
                    </div>
                    <div class="ml-3">
                        <button @click="sellTickets()"
                                class="bg-purple-600 text-gray-200 rounded px-6 py-2 focus:outline-none mx-1">გაყიდვა</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex absolute bottom-7 right-12">
            <button @click="closeModal()"
                    class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">დახურვა</button>
<!--            <button @click="sellTickets()"-->
<!--                    class="bg-purple-600 text-gray-200 rounded px-6 py-2 focus:outline-none mx-1">შენახვა</button>-->
        </div>
    </div>
</template>
<script>
export default {
    props: [],
    data() {
        return {
            departure: [],
            tickets: [],
            soldOutTicketCount: 0,
            leftTickets: 18,
            sellLimit: 18,
            departureID: null,
            ticketAmount: 1,
            finalStop: null
        }
    },
    mounted() {
        this.loadDepartureData();
    },
    watch:
        {
            '$store.state.currentDepartureId': function() {
                this.loadDepartureData();
            },

            soldOutTicketCount(){
                this.leftTickets = this.sellLimit - this.soldOutTicketCount;
            }
        },
    methods:
        {
            closeModal(){
                this.$store.state.modalTicketOpen = false;
            },

            loadDepartureData(){

                const departureId = this.$store.state.currentDepartureId;

                if(departureId === null)
                    return false;

                axios.get(`/ajax/departures/edit/load/${departureId}`).then(response => {

                    this.departure = response.data.departure,

                    this.tickets = response.data.departure.tickets,
                    this.soldOutTicketCount = response.data.soldOutTicketCount,
                    this.sellLimit = response.data.sellLimit,

                    console.log(response.data);
                    this.finalStop = this.departure.route.route_stops[0].id;

                }).catch(error => {
                    alert('დაფიქსირდა შეცდომა მონაცემების წამოღებისას.');
                })
            },

            sellTickets(){
                let data = {};
                data.departureID = this.$store.state.currentDepartureId;
                data.ticketAmount = this.ticketAmount;
                data.finalStop = this.finalStop;

                console.log(data);

                axios.post(`/ajax/departures/edit/sell/tickets/${data.departureID}`, data).then(response => {


                    console.log(response.data);

                }).catch(error => {
                    console.log(error);
                    //alert('ტრანსპორტი ან მძღოლი არ არის არჩეული');
                })

            }
        }
}
</script>
