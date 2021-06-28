import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex);



export default new Vuex.Store({

    state: {

        modalOpen: false,
        company_id: null,
        departures: [],
        schedule: [],
        routes: []

    },

    getters: {

    },

    mutations: {
        setCompanyId(state, id){
            state.company_id = id;
        }
    },

    actions: {
        setCompanyId({commit, state}, company_id) {
            commit("setCompanyId", company_id);
        },
        loadCompanyBuses({commit, state},company_id){
            axios
                .get(`/ajax/buses/${company_id}`).then(({data}) => {
                    console.log(data);
                    console.log(this.$store.state.company_id);
                }).catch((error) => {
                    console.log(error);
                    alert('დაფიქსირდა შეცდომა!');
                });
        }
    }
})
