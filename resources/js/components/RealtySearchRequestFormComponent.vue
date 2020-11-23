<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form class="row" v-on:submit.prevent="store()">

                            <div class="col-sm-6 form-group">
                                <label>{{ $t('realty.create.input.rent_period.label') }}:</label>
                                <div class="row">
                                    <div v-for="rent_period in RealtySearch.data.rent_period"
                                         class="col-12"
                                    >
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input"
                                                       v-model="values.rent_period"
                                                       type="radio"
                                                       :value="rent_period.id"
                                                       name="rent_period"
                                                >
                                                {{ rent_period.name }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="FormErrors.errors.rent_period_id">
                                    <small class="form-text text-danger" v-for="error in FormErrors.errors.rent_period_id">{{ error }}</small>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{ this.$t('realty.create.input.type.label') }}:</label>

                                <div v-for="type in RealtySearch.data.type" class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input"
                                               type="radio"
                                               :value="type.id"
                                               v-model="values.type"
                                               name="type"
                                        >
                                        {{ type.name}}
                                    </label>
                                </div>

                                <div v-if="FormErrors.errors.type_id">
                                    <small class="form-text text-danger" v-for="error in FormErrors.errors.type_id">{{ error }}</small>
                                </div>
                            </div>
                            <div v-if="values.type === 1" class="form-group col-sm-6">
                                <label>{{ $t('realty.create.input.rooms_number.label') }}:</label>
                                <select multiple v-model="values.rooms_number" class="form-control">
                                    <option v-for="rooms_number in RealtySearch.data.rooms_number"
                                            v-bind:value="rooms_number.id"
                                    >{{ rooms_number.name }}</option>
                                </select>
                                <div v-if="FormErrors.errors.type_id">
                                    <small class="form-text text-danger" v-for="error in FormErrors.errors.type_id">{{ error }}</small>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label v-if="RealtySearch.values.rent_period === 2">{{ $t('realty.create.input.price.month.label') }}:</label>
                                <label v-else-if="RealtySearch.values.rent_period === 1">{{ $t('realty.create.input.price.day.label') }}:</label>
                                <label v-else>{{ $t('realty.create.input.price.label') }}:</label>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <input type="number"
                                               class="form-control"
                                               v-model="values.price_from"
                                               :placeholder="this.$t('realty.create.input.price.from.label')"
                                        >
                                    </div>
                                    <div class="form-group col-6">
                                        <input type="number"
                                               class="form-control"
                                               v-model="values.price_to"
                                               :placeholder="this.$t('realty.create.input.price.to.label')"
                                        >
                                    </div>
                                </div>
                                <div v-if="FormErrors.errors.price_from">
                                    <small class="form-text text-danger" v-for="error in FormErrors.errors.price_from">{{ error }}</small>
                                </div>
                                <div v-if="FormErrors.errors.price_to">
                                    <small class="form-text text-danger" v-for="error in FormErrors.errors.price_to">{{ error }}</small>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{ $t('realty.search.input.persons_number.label') }}:</label>
                                <input type="number"
                                       class="form-control"
                                       v-model="values.persons_number"
                                >
                                <div v-if="FormErrors.errors.persons_number">
                                    <small class="form-text text-danger"
                                           v-for="error in FormErrors.errors.persons_number"
                                    >{{ error }}</small>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <label>{{ $t('realty.search.input.additional_info.label') }}:</label>
                                <textarea class="form-control"
                                          v-model="values.additional_info"
                                          rows="10"></textarea>
                            </div>



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions, mapMutations } from 'vuex';
    export default {
        name: "RealtySearchRequestFormComponent",
        props: [
            'rent_period',
            'type',
            'rooms_number'
        ],
        data () {
            return {
                values: {
                    rent_period: null,
                    type: null,
                    rooms_number: [],
                    price_from: null,
                    price_to: null,
                    persons_number: null,
                    children_number: null,
                    additional_info: null,
                },
            };
        },
        mounted() {
            this.fillData({
                rent_period: this.rent_period,
                type: this.type,
                rooms_number: this.rooms_number
            });
        },
        computed: {
            ...mapState({
                RealtySearch: state => state.RealtySearch,
                MainStorage: state => state.MainStorage,
                FormErrors: state => state.FormErrors
            }),
        },
        methods: {
            ...mapActions('RealtySearch', [
                'fillData',
                'setSearchPriceFrom',
                'setSearchPriceTo',
            ]),
            ...mapMutations('RealtySearch', [
                'setSearchRentPeriod',
                'setSearchType',
                'setSearchRoomsNumber',
                'setSearchPersonsNumber',
                'setSearchChildrenNumber',
                'setSearchAdditionalInfo',
            ]),
            store ()
            {
                console.log(123)
            }
        },
        watch: {
            'values.rent_period'(value) {
                if (value !== this.RealtySearch.values.rent_period) this.setSearchRentPeriod(value);
            },
            'RealtySearch.values.rent_period'(value)
            {
                if (this.values.rent_period !== value) this.values.rent_period = value;
            },
            'values.type'(value){
                if (value !== this.RealtySearch.values.type) this.setSearchType(value)
            },
            'RealtySearch.values.type'(value)
            {
                if (this.values.type !== value) this.values.type = value;
            },
            'values.rooms_number'(value){
                if (value !== this.RealtySearch.values.rooms_number) this.setSearchRoomsNumber(value)
            },
            'RealtySearch.values.rooms_number'(value)
            {
                if (this.values.rooms_number !== value) this.values.rooms_number = value;
            },
            'values.price_from'(value){
                if (value !== this.RealtySearch.values.price_from) this.setSearchPriceFrom(value)
            },
            'RealtySearch.values.price_from'(value)
            {
                if (this.values.price_from !== value) this.values.price_from = value;
            },
            'values.price_to'(value){
                if (value !== this.RealtySearch.values.price_to) this.setSearchPriceTo(value)
            },
            'RealtySearch.values.price_to'(value)
            {
                if (this.values.price_to !== value) this.values.price_to = value;
            },
            'values.persons_number'(value){
                if (value !== this.RealtySearch.values.persons_number) this.setSearchPersonsNumber(value)
            },
            'RealtySearch.values.persons_number'(value)
            {
                if (this.values.persons_number !== value) this.values.persons_number = value;
            },
            'values.children_number'(value){
                if (value !== this.RealtySearch.values.children_number) this.setSearchChildrenNumber(value)
            },
            'RealtySearch.values.children_number'(value)
            {
                if (this.values.children_number !== value) this.values.children_number = value;
            },
            'values.additional_info'(value){
                if (value !== this.RealtySearch.values.additional_info) this.setSearchAdditionalInfo(value)
            },
            'RealtySearch.values.additional_info'(value)
            {
                if (this.values.additional_info !== value) this.values.additional_info = value;
            }
        }
    }
</script>

<style scoped>

</style>
