<template>
    <div>
        <div class="mt-5 mb-10 relative">
            <label for="plate_number" class="block text-sm font-medium text-gray-700">შეიყვანეთ ავტომობილის ნომერი:</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input v-model="plateNumber" type="text" name="price" id="plate_number" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="BC097CB">
                <div class="absolute inset-y-0 right-0 flex items-center">
                    <label for="driver_id" class="sr-only">Currency</label>
                    <select v-if="this.attachedDrivers.length > 0" id="driver_id" name="driver_id" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                        <option v-for="driver in this.attachedDrivers">{{driver.name}} {{driver.surname}}</option>
                    </select>
                </div>
            </div>
            <div v-if="this.filteredBuses.length > 0" class="flex flex-col w-full bg-gray-50 mt-2 absolute">
                <span v-for="(bus, index) in this.filteredBuses" @click="chooseBus(index)" class="p-2 w-full cursor-pointer hover:bg-gray-100">{{bus.plate_number}}</span>
            </div>
        </div>

        <div class="flex absolute bottom-7 right-12">
            <button @click="closeModal()"
                    class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">გაუქმება</button>
            <button @click="closeModal()"
                class="bg-purple-600 text-gray-200 rounded px-6 py-2 focus:outline-none mx-1">დამატება</button>
        </div>
    </div>
</template>
<script>
export default {
    props: [],
    data() {
        return {
            plateNumber: null,
            attachedDrivers:[],
            companyBuses:[],

            chosenBus: null,

            filteredBuses:[]
        }
    },
    mounted() {
        setTimeout(() => {
            axios
                .get(`/ajax/buses/${this.$store.state.company_id}`).then(({data}) => {
                this.companyBuses = data;
            }).catch((error) => {
                console.log(error);
            });
        },0)
    },
    watch:
        {
            plateNumber(){
                if(this.plateNumber.length > 1) {
                    this.filteredBuses = this.companyBuses.filter(bus => {
                        return bus.plate_number.toLowerCase().includes(this.plateNumber.toLowerCase())
                    })
                }else{
                    this.filteredBuses = [];
                }
            }
        },
    methods:
        {
            closeModal(){
                this.$store.state.modalOpen = false;
            },
            chooseBus(busIndex){
                this.plateNumber = this.filteredBuses[busIndex].plate_number;
                this.attachedDrivers = this.filteredBuses[busIndex].drivers
            }
        }
}
</script>
