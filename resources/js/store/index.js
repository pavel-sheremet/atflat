import Vue from 'vue';
import Vuex from 'vuex';
import 'es6-promise/auto';
import MainStorage from "./modules/main";


Vue.use(Vuex);

export default new Vuex.Store({
    modules: { MainStorage },
    strict: true
})
