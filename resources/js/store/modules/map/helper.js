const YandexMapHelper = {
    getMetro(coords, params = {}) {
        let geoCodeOptions = {
            kind: 'metro',
            results: 3
        };

        return ymaps.geocode(coords, geoCodeOptions).then(res => {
            let result = [];

            res.geoObjects.each(function (nearestMetro) {

                let nearestMetroCoords = nearestMetro.geometry.getCoordinates();
                let distance = ymaps.coordSystem.geo.getDistance(coords, nearestMetroCoords);

                result.push({
                    name: nearestMetro.properties.get('name').replace('метро', '').trim(),
                    distance: distance
                });
            });

            return result;
        });
    },
    getAddressByGeoCode (geocode, params = null)
    {
        params = params || {results: 5, kind: 'house'};

        return ymaps.geocode(geocode, params)
            .then(res => {
                let result = [];

                res.geoObjects.each(function (item) {
                    result.push({
                        properties: item.properties.getAll(),
                        coords: item.geometry.getCoordinates()
                    });
                });

                return result;
            })
    },
};

export default YandexMapHelper;
