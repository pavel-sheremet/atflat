<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form v-if="!RealtyCreate.data.status.loading && RealtyCreate.realty.geo.coords" v-on:submit.prevent="create(realty)">

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.type.label') }}</label>
                                    <select v-model="realty.type" class="form-control">
                                        <option v-for="type in RealtyCreate.data.type"
                                                v-bind:value="type.id"
                                        >{{ type.name }}</option>
                                    </select>
                                    <div v-if="FormErrors.data.type">
                                        <small class="form-text text-danger" v-for="error in FormErrors.data.type">{{ error }}</small>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.rooms_number.label') }}</label>
                                    <select v-model="realty.rooms_number" class="form-control">
                                        <option v-for="rooms_number in RealtyCreate.data.rooms_number"
                                                v-bind:value="rooms_number.id"
                                        >{{ rooms_number.name }}</option>
                                    </select>
                                    <div v-if="FormErrors.data.rooms_number">
                                        <small class="form-text text-danger" v-for="error in FormErrors.data.rooms_number">{{ error }}</small>
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
                                    <div v-if="FormErrors.data.price">
                                        <small class="form-text text-danger" v-for="error in FormErrors.data.price">{{ error }}</small>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>{{ this.$t('realty.create.input.sub_price.label') }}</label>
                                    <input type="number"
                                           class="form-control"
                                           v-model="realty.sub_price"
                                    >
                                    <div v-if="FormErrors.data.sub_price">
                                        <small class="form-text text-danger" v-for="error in FormErrors.data.sub_price">{{ error }}</small>
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
                                    <div v-if="FormErrors.data.area">
                                        <small class="form-text text-danger" v-for="error in FormErrors.data.area">{{ error }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{ this.$t('realty.create.input.description.label') }}</label>
                                <textarea v-model="realty.description" class="form-control" rows="3"></textarea>
                                <div v-if="FormErrors.data.description">
                                    <small class="form-text text-danger" v-for="error in FormErrors.data.description">{{ error }}</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ this.$t('main.form.create') }}
                            </button>

                        </form>

                        <div v-else class="d-flex justify-content-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapMutations, mapGetters } from 'vuex';

    export default {
        name: "RealtyCreateFormComponent",
        data() {
            return {
                realty: {
                    type: null,
                    rooms_number: null,
                    description: '',
                    price: null,
                    sub_price: null,
                },
            }
        },
        props: ['success_route'],
        mounted() {
            this.fillData();
        },
        computed: {
            ...mapState({
                RealtyCreate: state => state.RealtyCreate,
                FormErrors: state => state.FormErrors,
                YandexMap: state => state.YandexMap
            }),
            ...mapGetters('YandexMap', [
                'getAddressComponents'
            ])
        },

        methods: {
            ...mapMutations('RealtyCreate', [
                'setLoadingStatus',
                'setRealtyGeoData',
                'fillType',
                'fillRoomsNumber',
                'setSuccessRoute',
                'setRealtyType',
                'setRealtyRoomsNumber',
                'setRealtyDescription',
                'setRealtyPrice',
                'setRealtySubPrice',
                'setRealtyGeo',
            ]),
            async create ()
            {
                await this.setLoadingStatus(true);

                await axios.post('/realty/store', this.RealtyCreate.realty)
                    // .then(response => window.location.href = response.data.url)
                    .then(response => console.log(response))
                    .catch(error => {
                        this.$store.dispatch('FormErrors/fill', error.response.data.errors);
                        this.setLoadingStatus(false);
                    });

            },
            fillData ()
            {
                axios.post('/realty/create')
                    .then(response => {
                        this.fillType(response.data.type);
                        this.fillRoomsNumber(response.data.rooms_number);
                        this.setSuccessRoute(this.success_route);
                        this.setLoadingStatus(false);
                    })
                    .catch(error => console.error(error))
            }
        },
        watch: {
            'YandexMap.input.geo.coords'(value) {
                if (this.RealtyCreate.realty.geo !== value) this.setRealtyGeo(this.YandexMap.input.geo);
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
        },
    }
</script>

<style scoped>

</style>
