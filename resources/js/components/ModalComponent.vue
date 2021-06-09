<template>
    <transition name="modal">
        <div v-show="this.$store.state.modalOpen"
             class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
            <div  class="z-50 relative p-3 mx-auto my-0 max-w-full mt-40"
                 style="width: 500px;">
                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden px-10 py-10">
                    <div class="text-center font-light text-gray-700 mb-8">
                        დაამატეთ მიკრო ავტობუსი
                    </div>
                    <div class="flex justify-center">
                        <button @click="closeModal()"
                                class="bg-gray-300 text-gray-900 rounded hover:bg-gray-200 px-6 py-2 focus:outline-none mx-1">გაუქმება</button>
                        <button
                            class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-6 py-2 focus:outline-none mx-1">დამატება</button>
                    </div>
                </div>
            </div>
            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
        </div>
    </transition>
</template>
<script>
export default {
    props: [],
    data() {
        return {
            modalOpen: false,
        }
    },
    mounted() {
        //this.modalOpen = this.$store.state.modalOpen
    },
    watch:
    {
        '$store.state.modalOpen': function() {
            console.log('test')
        }
    },
    methods:
    {
        closeModal(){
            console.log('sdsdsd');
            this.$store.state.modalOpen = false;
        }
    }
}
</script>
