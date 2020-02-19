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
                            <li v-for="agent in agents" class="list-group-item px-0">
                                <a :href="agent.url">{{ agent.user.name }}</a>
                            </li>
                        </ul>
                    </div>
                    <button v-if="links.next"
                            v-on:click.prevent="setData(links.next)"
                            type="button"
                            class="btn btn-primary">{{ this.$t('main.button.load_more')}}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AgentsListComponent",
        data () {
            return {
                agents: [],
                meta: [],
                links: [],
                url: '/api/agent'
            }
        },
        mounted () {
            this.setData();
            console.log(this.links)
        },
        methods: {
            setData (url = this.url)
            {
                axios.post(url)
                    .then(response => {
                        let responseData = response.data;
                        this.meta = responseData.meta;
                        this.links = responseData.links;

                        let agents = responseData.data;

                        agents.map((item) =>  {
                            this.agents.push(item);
                        })

                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            existMore ()
            {

            }
        }
    }
</script>

<style scoped>

</style>
