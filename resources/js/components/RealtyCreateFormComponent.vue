<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div v-if="RealtyCreate.data.status.loading || !RealtyCreate.realty.geo.coords" class="overlay">
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

                        <form v-on:submit.prevent="store(realty)">

                            <div class="row">
                                <div class="form-group col-12">
                                    <div v-if="FormErrors.errors.street">
                                        <small class="form-text text-danger" v-for="error in FormErrors.errors.street">{{ error }}</small>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.type.label') }}</label>
                                    <select v-model="realty.type" class="form-control">
                                        <option v-for="type in RealtyCreate.data.type"
                                                v-bind:value="type.id"
                                        >{{ type.name }}</option>
                                    </select>
                                    <div v-if="FormErrors.errors.type_id">
                                        <small class="form-text text-danger" v-for="error in FormErrors.errors.type_id">{{ error }}</small>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.rooms_number.label') }}</label>
                                    <select v-model="realty.rooms_number" class="form-control">
                                        <option v-for="rooms_number in RealtyCreate.data.rooms_number"
                                                v-bind:value="rooms_number.id"
                                        >{{ rooms_number.name }}</option>
                                    </select>
                                    <div v-if="FormErrors.errors.rooms_number_id">
                                        <small class="form-text text-danger" v-for="error in FormErrors.errors.rooms_number_id">{{ error }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.price.label') }} ₽/месяц</label>
                                    <input type="number"
                                           class="form-control"
                                           v-model="realty.price"
                                    >
                                    <div v-if="FormErrors.errors.price">
                                        <small class="form-text text-danger" v-for="error in FormErrors.errors.price">{{ error }}</small>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.sub_price.label') }}</label>
                                    <input type="number"
                                           class="form-control"
                                           v-model="realty.sub_price"
                                    >
                                    <div v-if="FormErrors.errors.sub_price">
                                        <small class="form-text text-danger" v-for="error in FormErrors.errors.sub_price">{{ error }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>
                                        <span v-if="RealtyCreate.realty.type === 1">{{ this.$t('realty.create.input.area.flat.label') }}</span>
                                        <span v-else-if="RealtyCreate.realty.type === 2">{{ this.$t('realty.create.input.area.room.label') }}</span>
                                        <span v-else>{{ this.$t('realty.create.input.area.label') }}</span>
                                        {{ this.$t('realty.create.input.area.unit') }}<sup>2</sup>
                                    </label>

                                    <input type="number"
                                           class="form-control"
                                           v-model="realty.area"
                                    >
                                    <div v-if="FormErrors.errors.area">
                                        <small class="form-text text-danger" v-for="error in FormErrors.errors.area">{{ error }}</small>
                                    </div>
                                </div>
                            </div>

                            <file-uploader-input-component
                                v-bind:errors="[FormErrors.errors.images, FormErrors.errors.main_image_id]"
                            ></file-uploader-input-component>



                            <div class="form-group">
                                <div v-if="FormErrors.message">
                                    <small class="form-text text-danger">{{ FormErrors.message }}</small>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                {{ this.$t('main.form.save') }}
                            </button>



                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapMutations, mapGetters, mapActions } from 'vuex';
    import { yandexMap } from 'vue-yandex-maps';

    export default {
        name: "RealtyCreateFormComponent",
        components: { yandexMap },
        data() {
            return {
                realty: {
                    type: null,
                    rooms_number: null,
                    description: '',
                    price: null,
                    area: null,
                    sub_price: null,
                    geo: {
                        coords: []
                    },
                    images: [],
                    main_image: null
                },
            }
        },
        props: ['data_url', 'save_url'],
        mounted() {
            this.fillData();
        },
        computed: {
            ...mapState({
                RealtyCreate: state => state.RealtyCreate,
                FormErrors: state => state.FormErrors,
                YandexMap: state => state.YandexMap,
                Uploader: state => state.Uploader
            }),
            ...mapGetters('YandexMap', [
                'getAddressComponents'
            ])
        },

        methods: {
            ...mapMutations('RealtyCreate', [
                'setLoadingStatus',
                'setRealtyGeoCoords',
                'fillType',
                'fillRoomsNumber',
                'setSuccessRoute',
                'setRealtyType',
                'setRealtyRoomsNumber',
                'setRealtyDescription',
                'setRealtyPrice',
                'setRealtySubPrice',
                'setRealtyGeo',
                'setRealtyArea',
                'setRealtyImages',
            ]),
            ...mapActions('RealtyCreate', [
                'setRealtyData',
                'setRealtyMainImage'
            ]),
            async store ()
            {
                await this.setLoadingStatus(true);
                await this.$store.dispatch('FormErrors/clear');




                await axios.post(this.save_url, this.RealtyCreate.realty)
                    // .then(response => window.location.href = response.data.url)
                    .then(response => {
                        console.log(response);
                        this.setLoadingStatus(false);
                    })
                    .catch(error => {
                        this.$store.dispatch('FormErrors/fill', error.response.data);
                        this.setLoadingStatus(false);
                    });

            },
            fillData ()
            {
                axios.post(this.data_url)
                    .then(async response => {
                        this.fillType(response.data.type);
                        this.fillRoomsNumber(response.data.rooms_number);
                        this.setSuccessRoute(this.success_route);

                        if ('realty' in response.data)
                        {
                            this.setRealtyData(response.data.realty);
                            await this.$store.dispatch('YandexMap/selectAddressByCoords', response.data.realty.geo.coords);
                            await this.$store.commit('Uploader/setFiles', response.data.realty.images);
                            await this.setRealtyMainImage(response.data.realty.main_image);
                        }

                        this.setLoadingStatus(false);

                    })
                    .catch(error => console.error(error))
            }
        },
        watch: {
            'Uploader.main'(value)
            {
                this.setRealtyMainImage(value);
            },
            'RealtyCreate.realty.main_image'(value)
            {
                this.$store.commit('Uploader/setMain', value);
            },
            'realty.geo.coords'(value) {
                if (value !== this.RealtyCreate.realty.geo.coords) this.setRealtyGeoCoords(value);
            },
            'YandexMap.input.geo.coords'(value) {
                if (this.RealtyCreate.realty.geo !== value) this.setRealtyGeo(this.YandexMap.input.geo);
            },
            'Uploader.files'(value)
            {
                this.setRealtyImages(value);
            },
            'realty.type'(value) {
                if (value !== this.RealtyCreate.realty.type) this.setRealtyType(value);
            },
            'RealtyCreate.realty.type'(value) {
                if (this.realty.type !== value) this.realty.type = value;
            },
            'realty.rooms_number'(value) {
                if (value !== this.RealtyCreate.realty.rooms_number) this.setRealtyRoomsNumber(value);
            },
            'RealtyCreate.realty.rooms_number'(value) {
                if (this.realty.rooms_number !== value) this.realty.rooms_number = value;
            },
            'realty.description'(value) {
                if (value !== this.RealtyCreate.realty.description) this.setRealtyDescription(value);
            },
            'RealtyCreate.realty.description'(value) {
                if (this.realty.description !== value) this.realty.description = value;
            },
            'realty.price'(value) {
                if (value !== this.RealtyCreate.realty.price) this.setRealtyPrice(value);
            },
            'RealtyCreate.realty.price'(value) {
                if (this.realty.price !== value) this.realty.price = value;
            },
            'realty.sub_price'(value) {
                if (value !== this.RealtyCreate.realty.sub_price) this.setRealtySubPrice(value);
            },
            'RealtyCreate.realty.sub_price'(value) {
                if (this.realty.sub_price !== value) this.realty.sub_price = value;
            },
            'realty.area'(value) {
                if (value !== this.RealtyCreate.realty.area) this.setRealtyArea(value);
            },
            'RealtyCreate.realty.area'(value) {
                if (this.realty.area !== value) this.realty.area = value;
            }
        },
    }
</script>

<style scoped>

</style>
