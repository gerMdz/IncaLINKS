import axios from 'axios';

/**
 * @returns {Promise}
 */
export function fetchCorazones() {
    return axios.get('/api/v1/corazones', {
    });
}
