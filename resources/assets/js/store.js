import {getLocalUser} from "./helpers/auth";

const user = getLocalUser();

export default {
    state: {
        welcomeMessage: 'Welcome to Business classifieds',
        currentUser: user,
        isLoggedIn: !!user,
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
        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loginModal = false;
            state.currentUser = Object.assign({}, payload.data.user, {token: payload.data.access_token});
            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.auth_error = payload.data.error;
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