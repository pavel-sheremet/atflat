const AgentListStorage = {
    state: {
        url: '/api/agent',
        agents: [],
        meta: [],
        links: [],
        status: {
            loading: false
        }
    },

    mutations: {
        addAgent (state, agent)
        {
            state.agents.push(agent);
        },
        setMeta (state, data) {
            if (data !== state.meta)
            {
                state.meta = data;
            }
        },
        setLinks (state, data) {
            if (data !== state.links)
            {
                state.links = data;
            }
        },
        setStatusLoading (state, data)
        {
            if (data !== state.status.loading)
            {
                state.status.loading = data;
            }
        }
    },

    actions: {
        setData (context, data)
        {
            context.dispatch('AgentListStorage/addAgents', data.data, {root: true});
            context.commit('AgentListStorage/setMeta', data.meta, {root: true});
            context.commit('AgentListStorage/setLinks', data.links, {root: true});
            context.commit('AgentListStorage/setStatusLoading', false, {root: true});
        },
        addAgents (context, agents)
        {
            agents.map((item) =>  {
                context.commit('AgentListStorage/addAgent', item, {root: true})
            });
        }
    },

    namespaced: true,
};

export default AgentListStorage;
