export default {
    state: {
        welcomeMessage: 'Welcome to Business classifieds',
        currentUser: null,
        isLoggedIn: false,
		auth_error: null,
		loginModal: false,
		loginSuccess: null,
        cities: [],
        alert: {
            message: null,
            type: null
        }
    },
    getters: {
        welcome(state) {
            return state.welcomeMessage;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
		},
		loginSuccess(state) {
			return state.loginSuccess;
		},
        currentUser(state) {
            return state.currentUser;
        },
        authError(state) {
            return state.auth_error;
		},
		loginModal(state) {
			return state.loginModal;
		},
		cities(state) {
			return state.cities;
        },
        alert(state) {
            return state.alert;
        }
    },
    mutations: {
        login(state) {
            state.auth_error = null;
        },
        setCurrentUser(state, payload) {
            state.currentUser = payload.user;
            state.isLoggedIn = true;
        },
        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loginModal = false;
			state.loginSuccess = true;
            state.currentUser = payload.user;
            //localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
			state.loginSuccess = null;
            //state.auth_error = payload.data.error;
        },
        logout(state, payload) {
			state.loginSuccess = null;
            state.isLoggedIn = false;
            state.currentUser = null;
			window.axios.defaults.headers.common['X-CSRF-TOKEN'] = payload.csrfToken;
		},
		hideLoginModal(state) {
			state.loginModal = false;
		},
		showLoginModal(state) {
			state.loginModal = true;
		},
		loadCities(state, cities) {
			state.cities = cities;
        },
        alert(state, data) {
            state.alert.message = data.message
            state.alert.type = data.type
        }
    },

    actions: {
        login(context) {
            context.commit('login');
        },
        logout(context) {
            context.commit('logout');
		},
		showLoginModal(context) {
			context.commit('showLoginModal');
		},
		hideLoginModal(context) {
			context.commit('hideLoginModal');
		},
		loadCities(context) {
			axios.get('/spa/businesses/cities').then(response => {
				context.commit('loadCities', response.data.data.cities);
			});

        },
        clearAlert(context) {
            context.commit('alert', { message: '', type: '' })
        }
    }
}