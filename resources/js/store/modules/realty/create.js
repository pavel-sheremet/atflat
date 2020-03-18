const RealtyCreate = {
    state: {
        realty: {
            type: null,
            rooms_number: null,
            description: null,
            price: null,
            sub_price: null,
            success_route: ''
        },

        data: {
            rooms_number: {},
            type: {},
            status: {
                loading: true
            }
        }
    },

    mutations: {
        setRealtyType (state, data)
        {
            if (state.realty.type !== data)
            {
                state.realty.type = data;
            }
        },
        setRealtyRoomsNumber (state, data)
        {
            if (state.realty.rooms_number !== data)
            {
                state.realty.rooms_number = data;
            }
        },
        setRealtyDescription (state, data)
        {
            if (state.realty.description !== data)
            {
                state.realty.description = data;
            }
        },
        setRealtyPrice (state, data)
        {
            if (state.realty.price !== data)
            {
                state.realty.price = data;
            }
        },
        setRealtySubPrice (state, data)
        {
            if (state.realty.sub_price !== data)
            {
                state.realty.sub_price = data;
            }
        },

        fillType (state, data)
        {
            if (state.data.type !== data)
            {
                state.data.type = data;
            }
        },
        fillRoomsNumber (state, data)
        {
            if (state.data.rooms_number !== data)
            {
                state.data.rooms_number = data;
            }
        },
        setSuccessRoute (state, data)
        {
            if (state.realty.success_route !== data)
            {
                state.realty.success_route = data;
            }
        },
        setLoadingStatus (state, data)
        {
            if (state.data.status.loading !== data)
            {
                state.data.status.loading = data;
            }
        }
    },

    actions: {
        fillType (context, data)
        {
            context.commit('RealtyCreate/fillType', data, {root: true});
        },
        fillRoomsNumber (context, data)
        {
            context.commit('RealtyCreate/fillRoomsNumber', data, {root: true});
        },
        setSuccessRoute (context, data)
        {
            context.commit('RealtyCreate/setSuccessRoute', data, {root: true});
        },
        setLoadingStatus (context, data)
        {
            context.commit('RealtyCreate/setLoadingStatus', data, {root: true})
        }
    },

    namespaced: true,
};

export default RealtyCreate;
