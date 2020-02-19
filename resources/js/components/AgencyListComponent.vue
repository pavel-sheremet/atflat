<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-body pb-0">
                        <h5 class="card-title">
                            {{ this.$t('agency.page.index.block.agencies.title')}}
                        </h5>
                        <p class="card-text">
                            {{ this.$t('agency.page.index.block.agencies.description')}}
                        </p>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li v-for="agency in agencies" class="list-group-item px-0">
                                <a :href="agency.url">{{ agency.name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AgencyListComponent",
        data () {
            return {
                agencies: []
            }
        },
        mounted () {
            this.agencies = this.getAgencies();
        },
        methods: {
            getAgencies () {
                axios.post('/api/agency')
                    .then(response => {
                        console.log(response);
                        this.agencies = response.data.agencies
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
