import http from "../resources/http";

const MainStorage = {
    state: {},

    actions: {
        http (context, data)
        {
            http(data.url, data.mutation)
                .then(response => {
                    context.dispatch(data.mutation, response.data, {root: true})
                })
                .catch(error => {
                    console.error(error)
                })
        },
    },

    namespaced: true,
};

export default MainStorage;
