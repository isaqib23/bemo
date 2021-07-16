import axios from 'axios'

axios.interceptors.request.use(config => {
    config.headers['Accept'] = 'application/json'
    return config
}, error => {
    return Promise.reject(error.response)
})

axios.interceptors.response.use(response => {
    return response
}, async error => {
    return Promise.reject(error)
})
