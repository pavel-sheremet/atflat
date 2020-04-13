const RealtyCreate = {
    state: {
        realty: {
            type: null,
            rooms_number: null,
            description: null,
            price: null,
            area: null,
            sub_price: null,
            geo: {
                province: null,
                area: null,
                locality: null,
                vegetation: null,
                district: null,
                street: null,
                house: null,
                coords: null
            },
            success_route: '',
            images: []
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
        },
        setRealtyGeo (state, data)
        {
            if (state.realty.geo !== data)
            {
                state.realty.geo = data;
            }
        },
        setRealtyArea (state, data)
        {
            if (state.realty.area !== data)
            {
                state.realty.area = data;
            }
        },
        setRealtyGeoCoords (state, data)
        {
            if (state.realty.geo.coords !== data)
            {
                state.realty.geo.coords = data;
            }
        },
        setRealtyImages (state, data)
        {
            if (state.realty.images !== data)
            {
                state.realty.images = data;
            }
        }
    },

    actions: {
        setRealtyData (context, data)
        {
            context.commit('RealtyCreate/setRealtyType', data.type.id, {root: true});
            context.commit('RealtyCreate/setRealtyPrice', data.price, {root: true});
            context.commit('RealtyCreate/setRealtySubPrice', data.sub_price, {root: true});
            context.commit('RealtyCreate/setRealtyArea', data.area, {root: true});
            context.commit('RealtyCreate/setRealtyDescription', data.description, {root: true});
            context.commit('RealtyCreate/setRealtyRoomsNumber', data.rooms.id, {root: true});
            context.commit('RealtyCreate/setRealtyImages', data.images, {root: true});
        }
    },

    namespaced: true,
};

export default RealtyCreate;
