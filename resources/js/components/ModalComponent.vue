<template>
    <transition name="modal">
        <div>
            <!--attach drivers modal-->
            <div v-show="this.$store.state.modalOpen"
                 class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                <div  class="z-50 relative p-3 mx-auto my-0 max-w-full mt-40"
                     style="width: 800px; height: 400px">
                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-10 py-10" style=" height: 400px">

                        <add-bus-to-departure-component></add-bus-to-departure-component>

                    </div>
                </div>
                <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
            </div>

            <!--edit departures modal-->
            <div v-show="this.$store.state.modalTicketOpen"
                 class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                <div  class="z-50 relative p-3 mx-auto my-0 max-w-full mt-40"
                      style="width: 1200px; height: auto">
                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-10 py-10" style=" height: auto">

                        <edit-departures-component></edit-departures-component>

                    </div>
                </div>
                <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
            </div>
        </div>

    </transition>
</template>
<script>
import AddBusToDepartureComponent from "./Departures/AddBusToDepartureComponent";
import EditDeparturesComponent from "./Departures/EditDepartureComponent";
export default {
    components: {EditDeparturesComponent, AddBusToDepartureComponent},
    props: ['company_id'],
    data() {
        return {
            modalOpen: false,
        }
    },
    mounted() {
        this.$store.dispatch('setCompanyId', this.company_id);
    },
    watch:
    {
        '$store.state.modalOpen': function() {

        }
    },
    methods:
    {
        closeModal(){
            this.$store.state.modalOpen = false;
        }
    }
}
</script>
