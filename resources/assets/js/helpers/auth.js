export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/v1/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((error) => {
                rej(error);
            })
    })
}

export function getLocalUser() {
    const userStr = localStorage.getItem('user');

    if(!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}