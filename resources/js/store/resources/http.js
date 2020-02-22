export default function $http (url, params = {}) {
    return axios.post(url, params);
}
