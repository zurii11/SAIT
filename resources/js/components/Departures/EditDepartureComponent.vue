<template>
    <div>
        <div class="relative">
            <div v-if="this.$store.state.currentDepartureId !== null" class="mt-1 relative rounded-md shadow-sm">

                <div class="pb-6 text-lg flex justify-between">
                    <div class="flex font-semibold">
                        <span>{{departure.route.start_station.name}} - </span>
                        <span class="flex">
                            <span class="ml-2" v-for="routeStop in departure.route.route_stops"> {{routeStop.stop_station.name}}({{routeStop.price}} ლ)</span>
                        </span>
                    </div>
                    <div>
                        გაყიდული ბილეთები: {{soldOutTicketCount}}
                    </div>

                    <div>
                        დარჩენილი ბილეთები: {{sellLimit - soldOutTicketCount}}
                    </div>
                </div>


                <div class="flex mt-5">
                    <div>
                        <label for="ticket_amount">ბილეთების რაოდენობა:</label>
                        <select v-model="ticketAmount" id="ticket_amount" name="ticket_amount" class="">
                            <option v-for="index in this.leftTickets" v-bind:value="index">{{ index }}</option>
                        </select>
                    </div>
                    <div class="ml-3">
                        <label for="ticket_amount">გაჩერება:</label>
                        <select v-model="finalStop" id="final_stop" name="final_stop" class="">
                            <option class="ml-2" v-for="routeStop in departure.route.route_stops" v-bind:value="routeStop.id" > {{routeStop.stop_station.name}}</option>
                        </select>
                    </div>
                    <div class="ml-3 py-2">
                        <p>გადასახდელი თანხა: {{this.payPrice}}ლ</p>
                    </div>
                    <div class="ml-3">
                        <button @click="sellTickets()"
                                class="bg-purple-600 text-gray-200 rounded px-6 py-2 focus:outline-none mx-1">გაყიდვა</button>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>

        <div class="flex absolute bottom-7 right-12">
            <button @click="closeModal()"
                    class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">დახურვა</button>
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
            ticketPrice: 0,
            departureID: null,
            ticketAmount: 1,
            finalStop: null,
            payPrice: 0
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
            },
            finalStop(){
                //get chosen stop_station price
                this.ticketPrice = this.departure.route.route_stops.filter(routeStop => routeStop.id === this.finalStop)[0].price

                this.payPrice = this.ticketPrice * this.ticketAmount;
            },

            ticketAmount(){
                //get chosen stop_station price
                this.ticketPrice = this.departure.route.route_stops.filter(routeStop => routeStop.id === this.finalStop)[0].price

                this.payPrice = this.ticketPrice * this.ticketAmount;
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



                axios.post(`/ajax/departures/edit/sell/tickets/${data.departureID}`, data).then(response => {


                    console.log(response.data);

                }).catch(error => {
                    console.log(error);
                    //alert('ტრანსპორტი ან მძღოლი არ არის არჩეული');
                })

            },

        }
}
</script>
