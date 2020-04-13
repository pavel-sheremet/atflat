const Uploader = {
    state: {
        files: [],
        status: {
            upload: false
        },
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
        }
    },

    actions: {
        // addFiles (context, data)
        // {
        //     Array.from(data).map(file => {
        //         context.commit('Uploader/addFile', file, {root: true});
        //     });
        // },
        deleteFile (context, data)
        {
            let files = Array.from(context.state.files);
            files.splice(data, 1);

            context.commit('Uploader/setFiles', files, {root: true});
        }
    },

    getters: {},

    namespaced: true,
};

export default Uploader;
