import YandexMapHelper from "./helper";

const YandexMap = {
    state: {
        props: {
            init_start_coords: true,
            kind: 'house',
            result: 5,
            zoom: 16,
            scroll_zoom: false
        },
        status: {
            loading: true
        },
        settings: {
            apiKey: process.env.MIX_YA_MAP_API_KEY,
            lang: process.env.MIX_YA_MAP_LANG,
            coordorder: process.env.MIX_YA_MAP_COORD_ORDER,
            version: process.env.MIX_YA_MAP_VERSION,
        },
        coords: [0,0],
        controls: ['geolocationControl', 'zoomControl'],
        selected: null,
        input: {
            value: '',
            dropdown: {
                visible: false,
                items: null
            },
            geo: {
                province: null,
                area: null,
                locality: null,
                vegetation: null,
                district: null,
                street: null,
                house: null,
                coords: null,
                metro: []
            },
            addressComponents: null,
        },
        markers: []
    },

    mutations: {
        setCoords (state, data)
        {
            if (state.coords !== data)
            {
                state.coords = data;
            }
        },
        setSelected(state, data)
        {
            if (state.selected !== data)
            {
                state.selected = data;
            }
        },
        setInputValue (state, data)
        {
            if (state.input.value !== data)
            {
                state.input.value = data;
            }
        },
        showInputDropdown (state, data)
        {
            if (state.input.dropdown.visible !== data)
            {
                state.input.dropdown.visible = data
            }
        },
        setDropdownItems (state, data)
        {
            if (state.input.dropdown.items !== data)
            {
                state.input.dropdown.items = data;
            }
        },
        setStatusLoading (state, data)
        {
            if (state.status.loading !== data)
            {
                state.status.loading = data;
            }
        },
        setMarkers (state, data)
        {
            if (state.markers !== data)
            {
                state.markers = data;
            }
        },
        setAddressComponents (state, data)
        {
            if (state.input.addressComponents !== data)
            {
                state.input.addressComponents = data;
            }
        },
        setInputGeoProvince (state, data)
        {
            if (state.input.geo.province !== data)
            {
                state.input.geo.province = data
            }
        },
        setInputGeoArea (state, data)
        {
            if (state.input.geo.area !== data)
            {
                state.input.geo.area = data
            }
        },
        setInputGeoLocality (state, data)
        {
            if (state.input.geo.locality !== data)
            {
                state.input.geo.locality = data
            }
        },
        setInputGeoVegetation (state, data)
        {
            if (state.input.geo.vegetation !== data)
            {
                state.input.geo.vegetation = data
            }
        },
        setInputGeoDistrict (state, data)
        {
            if (state.input.geo.district !== data)
            {
                state.input.geo.district = data
            }
        },
        setInputGeoStreet (state, data)
        {
            if (state.input.geo.street !== data)
            {
                state.input.geo.street = data
            }
        },
        setInputGeoHouse (state, data)
        {
            if (state.input.geo.house !== data)
            {
                state.input.geo.house = data
            }
        },
        setInputGeoCoords (state, data)
        {
            if (state.input.geo.coords !== data)
            {
                state.input.geo.coords = data;
            }
        },
        setInputGeoMetro (state, data)
        {
            if (state.input.geo.metro !== data)
            {
                state.input.geo.metro = data;
            }
        },
        setZoom (state, data)
        {
            if (state.props.zoom !== data)
            {
                state.props.zoom = data;
            }
        },
        setPropByCode (state, data)
        {
            if (state.props[data.code] !== data.value)
            {
                state.props[data.code] = data.value;
            }
        }
    },

    actions: {
        selectAddressByCoords (context, data)
        {
            ymaps.ready(() => {
                ymaps.geocode(data, {
                    results: context.state.props.results,
                    kind: context.state.props.kind,
                }).then(res => {

                    let geoObject = res.geoObjects.get(0);

                    context.dispatch('YandexMap/selectAddress', {
                        coords: data,
                        properties: geoObject.properties.getAll()
                    }, {root: true});
                });
            })

        },
        async selectAddress (context, data)
        {
            context.commit('YandexMap/showInputDropdown', false, {root: true});
            context.commit('YandexMap/setSelected', data, {root: true});
            context.commit('YandexMap/setInputValue', data.properties.text, {root: true});
            await context.commit('YandexMap/setCoords', data.coords, {root: true});
            context.dispatch('YandexMap/setAddress', data, {root: true});
            context.dispatch('YandexMap/setMarker', data, {root: true});
            context.dispatch('YandexMap/setInputGeoMetro', data.coords, {root: true});
        },
        async setInputGeoMetro (context, data)
        {
            await YandexMapHelper.getMetro(data)
                .then(res => {context.commit('YandexMap/setInputGeoMetro', res, {root: true})})
        },
        setMarker (context, data)
        {
            // TODO: to do something with marker id
            context.commit('YandexMap/setMarkers', [{coords: data.coords, id: 'test'}], {root: true})
        },
        setAddress (context, data)
        {
            context.commit('YandexMap/setAddressComponents', data.properties.metaDataProperty.GeocoderMetaData.Address.Components, {root: true});
            context.commit('YandexMap/setInputGeoProvince', context.getters.getAddressComponents('province'), {root: true});
            context.commit('YandexMap/setInputGeoArea', context.getters.getAddressComponents('area'), {root: true});
            context.commit('YandexMap/setInputGeoLocality', context.getters.getAddressComponents('locality'), {root: true});
            context.commit('YandexMap/setInputGeoVegetation', context.getters.getAddressComponents('vegetation'), {root: true});
            context.commit('YandexMap/setInputGeoDistrict', context.getters.getAddressComponents('district'), {root: true});
            context.commit('YandexMap/setInputGeoStreet', context.getters.getAddressComponents('street'), {root: true});
            context.commit('YandexMap/setInputGeoHouse', context.getters.getAddressComponents('house'), {root: true});
            context.commit('YandexMap/setInputGeoCoords', data.coords, {root: true});
        },
        setProps (context, data)
        {
            for (let [key, value] of Object.entries(data).filter(item => item[1] !== undefined))
            {
                context.commit('YandexMap/setPropByCode', {
                    code: key,
                    value: value
                }, {root: true});
            }
        }
    },

    getters: {
        getAddressComponents: state => kind => {
            if (!kind) return state.input.addressComponents;

            let res = state.input.addressComponents.filter(item => item.kind === kind);

            return (res.length) ? res[res.length - 1]['name'] : null;
        },
    },

    namespaced: true,
};

export default YandexMap;
