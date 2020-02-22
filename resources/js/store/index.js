import Vue from 'vue';
import Vuex from 'vuex';
import 'es6-promise/auto';
import MainStorage from "./modules/main";
import AgentListStorage from "./modules/agent/list";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: { MainStorage, AgentListStorage },
    strict: true
})
