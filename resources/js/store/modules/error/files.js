const FilesErrors = {
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
            let unique = [...new Set(Object.values(data).flat())];

            context.commit('FilesErrors/fill', unique, {root: true});
        },
        clear (context)
        {
            context.commit('FilesErrors/clear', {}, {root: true});
        }
    },

    namespaced: true,
};

export default FilesErrors;
