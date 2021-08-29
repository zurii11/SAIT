<template>
    <div class="mainWrapper h-auto flex justify-center flex-wrap bg-gray-100 z-0" >
        <div class="image h-auto w-full">
            <img src="https://cdn.flixbus.de/2021-05/flixbus-homepage-4a037b9132b84a856ce3c59714950ab8_6.jpeg" alt="" class="w-full">
        </div>
        <div class="main h-auto xl:w-8/12 w-full xl:-mt-24 -mt-10">
            <h1 class="text-gray-100 text-3xl ">Dummy Text</h1>
            <div class="content-main w-full h-auto mt-2 bg-gray-50 shadow-xl xl:rounded flex flex-wrap sm:justify-between justify-center sm:pb-2 pl-2 pr-2 pb-2">
                <div class="FromTo relative flex flex-wrap justify-items-start xl:w-auto w-full p-0">
                    <div class="from relative sm:h-full xl:w-52 sm:w-1/2 w-full pt-1">
                        <label for="from"><span>From</span></label>
                        <div class="inp flex justify-start sm:rounded-tr-none sm:rounded-br-none rounded border sm:border-r-0 border-gray-800 p-2 pr-0">
                            <div class="icon h-6 w-6 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                class="h-6 w-6" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <input type="text" name="from" class="w-full z-20 outline-none" id="fromto" v-model="inpValueFrom" @click="openList('from')" @keyup="searchStation('from')">
                        </div>
                    </div>
                    <div class="switch z-30 absolute sm:w-6 w-8 top-16 sm:top-8 mt-1 right-0 sm:left-1/2 sm:-ml-3 bg-gray-50 rounded-full">
                        <button class="rounded-full border border-gray-800 flex justify-center" @click="swap">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-8 w-8 sm:h-6 sm:w-6" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </button>
                    </div>
                    <div v-bind:class="{ 'sm:left-1/2 left-0 sm:top-20 top-36': !fromTo, 'left-0': fromTo }" class="datalist max-h-52 overflow-scroll text-gray-600 absolute w-80 top-20 rounded border border-gray-200 bg-gray-50 z-50" v-if="showList" v-click-outside="() => closeList('stations')">
                        <ul id="stations">
                            <li v-for="(station, index) in stations" :key="index" class="region1 station p-2 hover:bg-gray-200" id="c1" @click="selectStation(station.name)">{{ station.name }}</li>
                        </ul>
                    </div>
                    <div class="to sm:h-full xl:w-52 sm:w-1/2 w-full pt-1">
                        <label for="to"><span>To</span></label>
                        <div class="inp flex justify-start sm:rounded-tl-none sm:rounded-bl-none rounded border border-gray-800 p-2 sm:pl-4 pl-2">
                            <div class="icon h-6 w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                class="h-6 w-6" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" 
                                stroke-linejoin="round" 
                                stroke-width="2" 
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <input type="text" name="to" class="w-5/6 outline-none" id="fromto" v-model="inpValueTo" @click="openList('to')" @keyup="searchStation('to')">
                        </div>
                    </div>
                </div>
                <div class="to sm:h-full sm:w-52 w-full xl:ml-0 sm:-ml-2 pt-1">
                    <label for="from"><span>Departure</span></label>
                    <div class="inp flex justify-start rounded border border-gray-800 p-2">
                        <div class="icon h-6 w-6">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-6 w-6" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <!-- Implement for safari(has no datepicker) -->
                        <input type="date" id="datepicker" name="from" class="w-5/6 outline-none" v-model="departure">
                    </div>
                </div>
                <div class="to sm:h-full sm:w-52 w-full xl:ml-0 sm:-ml-2 pt-1 relative z-40">
                    <label for="from"><span>Passangers</span></label>
                    <div class="inp flex justify-start rounded border border-gray-800 p-2">
                        <input type="button" name="from" id="dep" v-model="passangers" class="w-full outline-none bg-gray-50" @click="openList('pass')">
                        <div class="passangers absolute w-72 bg-gray-50 top-20 left-2 rounded border border-gray-200 p-2" v-if="showPass" v-click-outside="() => closeList('pass')">
                            <ul>
                                <li class="p-2 flex justify-between items-center">
                                    <span>Adults</span>
                                    <div class="buttons">
                                        <button @click="changeQuantity('ad', 'minus')">-</button>
                                        <input type="number" v-model="adults" min="0" class="w-11 h-10 rounded border border-gray-200 text-center">
                                        <button @click="changeQuantity('ad', 'plus')">+</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="search h-full flex justify-center items-center sm:mt-7 mt-2">
                    <button class="w-16 bg-yellow-500 rounded text-gray-100 h-10" @click="search()">Search</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    directives: {
        // Custom directive for detecting clicks outside the element
        'click-outside': {
            bind(el, binding, vnode) {
                var vm = vnode.context;
                var callback = binding.value;

                el.clickOutsideEvent = function (event) {
                    // check if element(on which directive is called) is not target of click, nor it contains the target
                    if (!(el == event.target || el.contains(event.target))) {
                        // check if target in not the input that calls the element
                        if (!(event.target.id == 'dep' || event.target.id =='fromto')) {
                            return binding.value();
                        }
                        // return callback.call(vm, event);
                    } 
                };
                document.body.addEventListener('click', el.clickOutsideEvent);
            },
            unbind(el) {
                document.body.removeEventListener('click', el.clickOutsideEvent);
            }
        }
    },

    data() {
        return {
            stations: [],
            showPass: false,
            showList: false,
            fromTo: true,
            adults: 0,
            inpValueFrom: '',
            inpValueTo: '',
            departure: ''
        }
    },

    created() {
        axios.get('api/stations').then(res => {
            this.stations = res.data;
        });
    },

    computed: {
        passangers: {
            get() {
                let adtxt = 'Adults';

                if (this.adults == 1) {
                    adtxt = 'Adult'
                }

                return `${this.adults} ${adtxt}`;
            }
        }
    },

    methods: {
        search() {
            axios.get('api/', { 
                params: { 
                    date: this.departure,
                    startStation: this.inpValueFrom,
                    stopStation: this.inpValueTo,
                    tickets: this.adults
                }}).then(res => {
                this.$router.push({
                  name: 'res',
                  params: {
                      date: this.departure,
                      start: this.inpValueFrom,
                      stop: this.inpValueTo,
                      tickets: this.adults,
                      data: res.data
                      }
                }).catch(error => {
                    return 0;
                });
                // console.log(res.data);
                // console.log(this.departure);
            })
        },

        searchStation(id) {
            let filterValue;

            if (id == 'from') {
                filterValue = this.inpValueFrom;
            } else if (id == 'to') {
                filterValue = this.inpValueTo;
            }
            let ul = document.querySelector('#stations');
            let li = ul.querySelectorAll('li.station');

            for (const key in li) {
                if (li.hasOwnProperty(key)) {
                    const element = li[key];
                    const text = element.innerHTML.toLowerCase();
                    if (text.includes(filterValue)) {
                        element.style.display = '';
                    } else {
                        element.style.display = 'none';
                    }
                }
            }
        },

        selectStation(station) {
            if (this.fromTo) {
                this.inpValueFrom = station;
            } else {
                this.inpValueTo = station;
            }

            this.closeList('stations');
        },

        openList(id) {
            if (id == 'pass') {
                this.showPass = true;
                this.showList = false;
            } else {
                if (id == 'from') {
                    this.fromTo = true;
                } else if (id =='to') {
                    this.fromTo = false;
                }

                this.showList = true;
                this.showPass = false;
            }
        },

        closeList(id) {
            if (id == 'stations') {
                this.showList = false;
            } else if (id == 'pass') {
                this.showPass = false;
            }
        },

        changeQuantity(pass, sign) {
            if (pass == 'ad') {
                if (sign == 'plus') {
                    this.adults++;
                } else if (sign == 'minus' && this.adults > 0) {
                    this.adults--;
                }
            }
        },

        swap() {
            let stationFrom = this.inpValueFrom;
            let stationTo = this.inpValueTo;

            this.inpValueFrom = stationTo;
            this.inpValueTo = stationFrom;
        }
    }
}
</script>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

/* input::-webkit-calendar-picker-indicator {
    display: none;
} */

@media screen and (min-width: 1280px) {
    .content-main {
        min-width: 928px;
    }
} 
</style>