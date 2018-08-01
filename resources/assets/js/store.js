import {getLocalUser} from "./helpers/auth";

const user = getLocalUser();

export default {
    state: {
        welcomeMessage: 'Welcome to Business classifieds',
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
		auth_error: null,
		loginModal: false
    },
    getters: {
        welcome(state) {
            return state.welcomeMessage;
        },
        isLoading(state) {
            return state.loading;
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
            state.loading = true;
            state.auth_error = null;
        },
        loginSuccess(state, payload) {
            state.auth.error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});
            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },
        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
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
		showLoginModal(context) {
			context.commit('showLoginModal');
		},
		hideLoginModal(context) {
			context.commit('hideLoginModal');
		}
    }
}