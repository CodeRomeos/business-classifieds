export default {
    state: {
        welcomeMessage: 'Welcome to Business classifieds',
        currentUser: null,
        isLoggedIn: false,
		auth_error: null,
		loginModal: false
    },
    getters: {
        welcome(state) {
            return state.welcomeMessage;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {
            return state.currentUser;
        },
        authError(state) {
            return state.auth_error;
		},
		loginModal(state) {
			return state.loginModal;
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

            state.currentUser = payload.user;
            //localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.auth_error = payload.data.error;
        },
        logout(state, payload) {
            state.isLoggedIn = false;
            state.currentUser = null;
            axios.defaults.headers.common['X-CSRF-TOKEN'] = payload.csrfToken;
		},
		hideLoginModal(state) {
			state.loginModal = false;
		},
		showLoginModal(state) {
			state.loginModal = true;
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
		}
    }
}