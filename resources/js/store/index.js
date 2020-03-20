import Vue from 'vue';
import Vuex from 'vuex';
import 'es6-promise/auto';
import MainStorage from "./modules/main";
import RealtyCreate from "./modules/realty/create";
import FormErrors from "./modules/error/form";
import YandexMap from "./modules/map/yandex";


Vue.use(Vuex);

export default new Vuex.Store({
    modules: { MainStorage, RealtyCreate, FormErrors, YandexMap },
    strict: true
})
