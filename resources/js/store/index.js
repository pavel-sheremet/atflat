import Vue from 'vue';
import Vuex from 'vuex';
import 'es6-promise/auto';
import MainStorage from "./modules/main";
import YandexMap from "./modules/map/yandex/yandex";
import RealtyCreate from "./modules/realty/create";
import FormErrors from "./modules/error/form";
import Uploader from "./modules/file/uploader";
import FilesErrors from "./modules/error/files";
import RealtySearch from "./modules/realty/search";


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        MainStorage,
        YandexMap,
        RealtyCreate,
        FormErrors,
        Uploader,
        FilesErrors,
        RealtySearch,
    },
    strict: true
})
