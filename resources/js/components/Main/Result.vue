<template>
    <div class="w-full h-full flex flex-wrap justify-center">
        <div v-for="(result, index) in results" :key="index" class="w-full flex justify-center mt-2 mb-2">
            <div class="w-6/12 max-w-3xl h-48 px-2 border border-gray-500 rounded">
                <div class="top flex w-full h-1/2">
                    <div class="time flex justify-start p-2 w-1/6" v>
                        <span>{{ result.departureTime }}</span>
                    </div>
                    <div class="stations w-4/6 h-full flex">
                        <div class="names w-full h-full p-2 flex flex-col justify-between">
                            <span id="start">{{ result.startStation.name }}</span>
                            <span id="stop">{{ result.searchedStop }}</span>
                        </div>
                    </div>
                    <div class="seats w-1/6 h-full flex justify-end">
                        <span>დარჩა {{ result.ticketsLeft }} ადგილი</span>
                    </div>
                </div>
                <div class="bottom w-full h-1/2 flex justify-between">
                    <div class="transport flex w-1/6 h-full items-center">
                        <span>{{ transport }}</span>
                    </div>
                    <div class="ticket flex w-1/6 h-full justify-end items-center">
                        <button class="flex text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">₾{{ result.price }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
#start::before {
    content: "•";
    color: #b83b3b;
    margin:0 10px;
}

.stations::before {
    content: "•";
    color: #b83b3b;
    margin:0 10px;
    display: inline-block;
    position: absolute;
    content: "";
    border-left: .1rem solid black;
    height: 3.5rem;
    margin: 0 1rem;
    transform: translate(0.35rem, 1.2rem);
}

#stop::before {
    content: "•";
    color: #b83b3b;
    margin:0 10px;
}
</style>
<script>
export default {
    data() {
        return {
            results: this.$route.params.data.data,
            // time: results.departureTime,
            // startStation: result.startStation.name,
            // stopStation: result.searchedStop,
            price: '10',
            // date: result.departureDate,
            transport: 'bus',
            seats: 0,
        }
    },

    mounted() {
        console.log(this.$route.params.data.data);
    },
}
</script>