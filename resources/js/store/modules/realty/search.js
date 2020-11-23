const RealtySearch = {
    state: {
        data: {
            rooms_number: {},
            type: {},
            status: {
                loading: true
            },
            rent_period: [],
        },
        values: {
            type: null,
            rent_period: null,
            rooms_number: [],
            price_from: null,
            price_to: null,
            persons_number: null,
            children_number: null,
            additional_info: null
        }
    },

    mutations: {
        setDataRentPeriod (state, data)
        {
            if (state.data.rent_period !== data)
            {
                state.data.rent_period = data;
            }
        },
        setDataRoomsNumber (state, data)
        {
            if (state.data.rooms_number !== data)
            {
                state.data.rooms_number = data;
            }
        },
        setDataType (state, data)
        {
            if (state.data.type !== data)
            {
                state.data.type = data;
            }
        },
        setSearchRentPeriod (state, data)
        {
            if (state.values.rent_period !== data)
            {
                state.values.rent_period = data;
            }
        },
        setSearchType (state, data)
        {
            if (state.values.type !== data)
            {
                state.values.type = data;
            }
        },
        setSearchRoomsNumber (state, data)
        {
            if (state.values.rooms_number !== data)
            {
                state.values.rooms_number = data;
            }
        },
        setSearchPriceFrom (state, data)
        {
            if (state.values.price_from !== data)
            {
                state.values.price_from = data;
            }
        },
        setSearchPriceTo (state, data)
        {
            if (state.values.price_to !== data)
            {
                state.values.price_to = data;
            }
        },
        setSearchPersonsNumber (state, data)
        {
            if (state.values.persons_number !== data)
            {
                state.values.persons_number = data;
            }
        },
        setSearchChildrenNumber (state, data)
        {
            if (state.values.children_number !== data)
            {
                state.values.children_number = data;
            }
        },
        setSearchAdditionalInfo (state, data)
        {
            if (state.values.additional_info !== data)
            {
                state.values.additional_info = data;
            }
        }
    },

    actions: {
        fillData (context, data)
        {
            context.commit('RealtySearch/setDataRentPeriod', data.rent_period, {root: true});
            context.commit('RealtySearch/setDataRoomsNumber', data.rooms_number, {root: true});
            context.commit('RealtySearch/setDataType', data.type, {root: true});
        },
        setSearchPriceFrom (context, data)
        {
            context.commit('RealtySearch/setSearchPriceFrom', data, {root: true});

            if (context.state.values.price_to < data)
            {
                context.commit('RealtySearch/setSearchPriceTo', data, {root: true})
            }
        },
        setSearchPriceTo (context, data)
        {
            context.commit('RealtySearch/setSearchPriceTo', data, {root: true});
        },
    },

    namespaced: true,
};

export default RealtySearch;
