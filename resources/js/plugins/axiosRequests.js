export default class axiosRequest {

    static post (path, payload=null) {
        return axios.post(api.path(path), payload)
            .then(resp => {
                return {
                    status : 200,
                    details : (resp.data.token) ? resp.data : resp.data.details
                };
            })
            .catch((err) => {
                if (!err.response) {
                    return {
                        status : 500,
                        details : 'Error: Network Error'
                    };
                } else if (err.response.status == 422){
                    return {
                        status : err.response.status,
                        details : err.response.data.message
                    };
                } else {
                    return {
                        status : err.response.status,
                        details : err.response.data.errors
                    };
                }
            });
    }

    static put (path, payload=null) {
        return axios.put(api.path(path), payload)
            .then(resp => {
                return {
                    status : 200,
                    details : resp.data.details
                };
            })
            .catch(err => {
                if (!err.response) {
                    return {
                        status : 'Error: Network Error',
                        details : ''
                    };
                } else {
                    return {
                        status : err.response.status,
                        details : err.response.data.errors
                    };
                }
            });
    }

    static get (path, payload=null) {
        if(payload === null){
            return axios.get(api.path(path))
                .then(function(resp){
                    return {
                        status : 200,
                        details : resp.data.details
                    };
                })
                .catch(err => {
                    if (!err.response) {
                        return {
                            status : 'Error: Network Error',
                            details : ''
                        };
                    } else {
                        return {
                            status : err.response.status,
                            details : err.response.data.errors
                        };
                    }
                });
        }

        return axios.get(api.path(path) + payload)
            .then(function(resp){
                return {
                    status : 200,
                    details : resp.data.details
                };
            })
            .catch(err => {
                if (!err.response) {
                    return {
                        status : 'Error: Network Error',
                        details : ''
                    };
                } else {
                    return {
                        status : err.response.status,
                        details : err.response.data.errors
                    };
                }
            });
    }

    static delete (path, payload) {
        return axios.delete(api.path(path), {data:payload})
            .then(function(resp){
                return {
                    status : 200,
                    details : resp.data.details
                };
            })
            .catch(err => {
                if (!err.response) {
                    return {
                        status : 'Error: Network Error',
                        details : ''
                    };
                } else {
                    return {
                        status : err.response.status,
                        details : err.response.data.errors
                    };
                }
            });
    }
};
