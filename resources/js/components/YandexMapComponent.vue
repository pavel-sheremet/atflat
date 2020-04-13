<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-2">

                    <div v-if="YandexMap.status.loading" class="overlay">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="loading-block row justify-content-center">
                                        <div class="spinner-border mb-2" role="status">
                                        </div>
                                        <span class="col-12 loading-block__text">
                                            {{ this.$t('main.common.status.loading') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group position-relative">
                            <input type="text"
                                   class="form-control"
                                   :placeholder="this.$t('realty.create.input.address.label.type_or_click')"
                                   @keyup.prevent="searchAddress($event.target.value)"
                                   v-model="input.value"
                            >
                            <ul v-if="YandexMap.input.dropdown.items && YandexMap.input.dropdown.visible"
                                class="list-group position-absolute"
                                style="z-index: 9999"
                            >
                                <li v-for="item in YandexMap.input.dropdown.items"
                                    class="list-group-item"
                                    @click="selectAddress(item)"
                                >{{ item.properties.text }}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <yandex-map style="width: 100%; height: 400px"
                                :settings="YandexMap.settings"
                                :coords="YandexMap.coords"
                                :controls="YandexMap.controls"
                                :zoom="YandexMap.zoom"
                                @map-was-initialized="init"
                            >
                                <ymap-marker v-for="marker in YandexMap.markers" v-bind:key="marker.id"
                                             :coords="marker.coords"
                                             :marker-id="marker.id"
                                />
                            </yandex-map>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { yandexMap, ymapMarker } from 'vue-yandex-maps';
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex';
    import YandexMapHelper from "../store/modules/map/helper";

    export default {
        name: "YandexMapComponent",
        components: { yandexMap, ymapMarker },
        data ()
        {
            return {
                input: {
                    value: ''
                },
                map: null,
                timerId: null
            }
        },
        props: ['init_start_coords'],
        computed: {
            ...mapState({
                YandexMap: state => state.YandexMap
            }),
            ...mapGetters('YandexMap', [
                'getAddressComponents',
                'locality',
                'street',
                'house',
            ])
        },
        watch: {
            'input.value': function (value) {
                if (value !== this.YandexMap.input.value)
                {
                    this.setInputValue(value);
                }
            },
            'YandexMap.input.value': function (value) {
                if (this.input.value !== value)
                {
                    this.input.value = value;
                }
            }
        },
        methods: {
            ...mapMutations('YandexMap', [
                'setStatusLoading',
                'setDropdownItems',
                'showInputDropdown',
                'setInputValue'
            ]),
            ...mapActions('YandexMap', [
                'selectAddress',
                'selectAddressByCoords',
            ]),

            async init (map)
            {
                this.map = map;


                if (this.init_start_coords)
                {
                    await ymaps.geolocation.get({
                        provider: 'auto',
                        // TODO: вроде без этого не находит текущую геолокацию, но это не точно...
                        // autoReverseGeocode: true
                    })
                        .then(result => {
                                let geoObject = result.geoObjects.get(0);
                                let selected = {
                                    coords: result.geoObjects.position,
                                    properties: geoObject.properties.getAll()
                                };

                                this.selectAddress(selected);
                            }
                        );
                }

                await this.map.events.add('click', async e => {
                    await this.selectAddressByCoords(e.get('coords'));
                });

                await this.setStatusLoading(false);

            },
            searchAddress (value) {
                if (!String(value).length) return false;

                clearTimeout(this.timerId);

                this.timerId = setTimeout(() => this.yaGeoCode(value), 1500);
            },
            async yaGeoCode (value) {
                let items = await YandexMapHelper.getAddressByGeoCode(value);

                this.setDropdownItems(items);
                this.showInputDropdown(true);
            }
        }
    }
</script>

<style scoped>

</style>
