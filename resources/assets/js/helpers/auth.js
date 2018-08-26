export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/spa/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((error) => {
                rej(error);
            })
    })
}

export function getAuthUser() {
    return new Promise((res, rej) => {
        axios.get('/spa/user')
            .then((response) => {
                res(response.data);
            })
            .catch((error) => {
                rej(error);
            })
    });
    /*
    const userStr = localStorage.getItem('user');

    if(!userStr) {
        return null;
    }

    return JSON.parse(userStr);
    */
}

export function logout() {
    return new Promise((res, rej) => {
        axios.get('/spa/logout')
            .then((response) => {
                res(response);
            })
            .catch((error) => {
                rej(error);
            })
    });
}
