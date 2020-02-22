<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-body pb-0">
                        <h5 class="card-title">
                            {{ this.$t('agent.page.index.block.agents.title')}}
                        </h5>
                        <p class="card-text">
                            {{ this.$t('agent.page.index.block.agents.description')}}
                        </p>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0" v-for="agent in AgentListStorage.agents">
                                <a :href="agent.url">{{ agent.user.name }}</a>
                            </li>
                        </ul>
                    </div>

                    <button v-if="AgentListStorage.links.next"
                            v-on:click.prevent="setData(AgentListStorage.links.next)"
                            :disabled="AgentListStorage.status.loading"
                            type="button"
                            class="btn btn-primary"
                    >{{ this.$t('main.button.load_more')}}</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';

    export default {
        name: "AgentsListComponent",
        data () {
            return {}
        },
        computed: {
            ...mapState({
                MainStorage: state => state.MainStorage,
                AgentListStorage: state => state.AgentListStorage,
            })
        },
        mounted () {
            this.setData();
        },
        methods: {
            setData (url = null)
            {
                this.$store.commit('AgentListStorage/setStatusLoading', true);
                this.$store.dispatch('MainStorage/http', {
                    url: url || this.AgentListStorage.url,
                    mutation: 'AgentListStorage/setData'
                });
            },
        }
    }
</script>

<style scoped>

</style>
