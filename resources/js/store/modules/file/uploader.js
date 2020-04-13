const Uploader = {
    state: {
        files: [],
        status: {
            upload: false
        },
        main: null
    },

    mutations: {
        addFile (state, data)
        {
            state.files.push(data)
        },
        setFiles (state, data)
        {
            if (state.files !== data)
            {
                state.files = data;
            }
        },
        setStatusUpload (state, data)
        {
            if (state.status.upload !== data)
            {
                state.status.upload = data;
            }
        },
        setMain (state, data)
        {
            if (state.main !== data)
            {
                state.main = data;
            }
        }
    },

    actions: {
        addFile (context, data)
        {
            context.commit('Uploader/addFile', data, {root: true});

            if (!context.state.main)
            {
                context.commit('Uploader/setMain', data, {root: true});
            }
        },
        deleteFile (context, data)
        {
            let files = Array.from(context.state.files);
            let file = files.splice(data, 1)[0];

            if (file.id === context.state.main.id)
            {
                context.commit('Uploader/setMain', files.length ? Object.assign({}, files[0]) : null, {root: true});
            }

            context.commit('Uploader/setFiles', files, {root: true});
        },
    },

    getters: {},

    namespaced: true,
};

export default Uploader;
