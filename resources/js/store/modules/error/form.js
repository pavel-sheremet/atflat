const FormErrors = {
    state: {
        data: {}
    },

    mutations: {
        fill (state, data)
        {
            if (state.data !== data)
            {
                state.data = data;
            }
        },
        clear (state, data)
        {
            if (state.data !== data)
            {
                state.data = data;
            }
        }
    },

    actions: {
        fill (context, data)
        {
            context.commit('FormErrors/fill', data, {root: true});
        },
        clear (context)
        {
            context.commit('FormErrors/clear', {}, {root: true});
        }
    },

    getters : {
        flat: state => {
            return Object.values(state.data).flat();
        }
    },

    namespaced: true,
};

export default FormErrors;
