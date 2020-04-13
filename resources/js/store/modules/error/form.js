const FormErrors = {
    state: {
        errors: {},
        message: null
    },

    mutations: {
        setErrors (state, data)
        {
            if (state.errors !== data)
            {
                state.errors = data;
            }
        },
        setMessage (state, data)
        {
            if (state.message !== data)
            {
                state.message = data;
            }
        }
        // fill (state, data)
        // {
        //     if (state.errors !== data)
        //     {
        //         state.errors = data;
        //     }
        // },
        // clear (state, data)
        // {
        //     if (state.errors !== data)
        //     {
        //         state.errors = data;
        //     }
        // }
    },

    actions: {
        fill (context, data)
        {
            context.commit('FormErrors/setErrors', data.errors, {root: true});
            context.commit('FormErrors/setMessage', data.message, {root: true});
        },
        clear (context)
        {
            context.commit('FormErrors/setErrors', {}, {root: true});
            context.commit('FormErrors/setMessage', null, {root: true});
        }
    },

    getters : {
        flat: state => {
            return Object.values(state.errors).flat();
        }
    },

    namespaced: true,
};

export default FormErrors;
