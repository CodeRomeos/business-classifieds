export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/v1/login', credentials)
            .then((resopons) => {
                res(response.data);
            })
            .catch((error) => {
                rej("Error");
            })
    })
}

export function getLocalUser() {
    const userStr = localStorage.getItem('user');

    if(!user) {
        return null;
    }

    return JSON.parse(userStr);
}