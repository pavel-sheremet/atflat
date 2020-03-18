<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div v-if="RealtyCreate.data.status.loading" class="d-flex justify-content-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <form v-else v-on:submit.prevent="create(realty)">

                            <div class="form-group">
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

                            <div class="form-group">
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

                            <div class="form-group">
                                <label>{{ this.$t('realty.create.input.price.label') }} ₽/месяц</label>
                                <input type="number"
                                       class="form-control"
                                       v-model="realty.price"
                                >
                                <div v-if="FormErrors.data.price">
                                    <small class="form-text text-danger" v-for="error in FormErrors.data.price">{{ error }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{ this.$t('realty.create.input.sub_price.label') }}</label>
                                <input type="number"
                                       class="form-control"
                                       v-model="realty.sub_price"
                                >
                                <div v-if="FormErrors.data.sub_price">
                                    <small class="form-text text-danger" v-for="error in FormErrors.data.sub_price">{{ error }}</small>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

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
                FormErrors: state => state.FormErrors
            }),
        },
        methods: {
            async create ()
            {
                await this.$store.dispatch('RealtyCreate/setLoadingStatus', true);

                await axios.post('/realty/store', this.RealtyCreate.realty)
                    .then(response => window.location.href = response.data.public_url)
                    .catch(error => {
                        this.$store.dispatch('FormErrors/fill', error.response.data.errors);
                        this.$store.dispatch('RealtyCreate/setLoadingStatus', false);
                    });

            },
            fillData ()
            {
                axios.post('/realty/create')
                    .then(response => {
                        this.$store.dispatch('RealtyCreate/fillType', response.data.type);
                        this.$store.dispatch('RealtyCreate/fillRoomsNumber', response.data.rooms_number);
                        this.$store.dispatch('RealtyCreate/setSuccessRoute', this.success_route);
                        this.$store.dispatch('RealtyCreate/setLoadingStatus', false);
                    })
                    .catch(error => console.error(error))
            }
        },
        watch: {
            'realty.type'(value) {
                if (value !== this.RealtyCreate.realty.type) this.$store.commit('RealtyCreate/setRealtyType', value);
            },
            'RealtyCreate.realty.type'(value) {
                if (this.realty.type !== value) this.realty.type = value;
            },
            'realty.rooms_number'(value) {
                if (value !== this.RealtyCreate.realty.rooms_number) this.$store.commit('RealtyCreate/setRealtyRoomsNumber', value);
            },
            'RealtyCreate.realty.rooms_number'(value) {
                if (this.realty.rooms_number !== value) this.realty.rooms_number = value;
            },
            'realty.description'(value) {
                if (value !== this.RealtyCreate.realty.description) this.$store.commit('RealtyCreate/setRealtyDescription', value);
            },
            'RealtyCreate.realty.description'(value) {
                if (this.realty.description !== value) this.realty.description = value;
            },
            'realty.price'(value) {
                if (value !== this.RealtyCreate.realty.price) this.$store.commit('RealtyCreate/setRealtyPrice', value);
            },
            'RealtyCreate.realty.price'(value) {
                if (this.realty.price !== value) this.realty.price = value;
            },
            'realty.sub_price'(value) {
                if (value !== this.RealtyCreate.realty.sub_price) this.$store.commit('RealtyCreate/setRealtySubPrice', value);
            },
            'RealtyCreate.realty.sub_price'(value) {
                if (this.realty.sub_price !== value) this.realty.sub_price = value;
            },
        },
    }
</script>

<style scoped>

</style>
