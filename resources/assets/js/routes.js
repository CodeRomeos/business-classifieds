import VueRouter from 'vue-router';
// Pages
import Home from './components/pages/Home'
import Listings from './components/pages/Listings'
import Business from './components/pages/Business'

import UserAccount from './components/User/UserAccount'
import UserBusiness from './components/User/UserBusiness'
import Bookmarks from './components/User/Bookmarks'
import store from './store'

let routes = [
	{
		path: '/',
        component: Home,
		name: 'home',
		meta: {title: 'Welcome'}
    },
    {
		path: '/listings',
        component: Listings,
		name: 'listings',
		meta: {title: 'All listings'}
	},
	{
		path: '/listings/:businessid',
		component: Business,
		name: 'business'
    },
    {
        path: '/account',
        name: 'userAccount',
        component: UserAccount,
        meta: {title: 'My Account', requiresAuth: true},
        children: [
            {
                path: 'business',
                component: UserBusiness,
                name: 'userBusiness',
                meta: {title: 'My Business'}
            },
            {
                path: 'bookmarks',
                component: Bookmarks,
                name: 'userBookmarks',
                meta: {title: 'My Bookmarks'}
            }
        ]
    }
];

const Router = new VueRouter({
    routes,
    mode: 'history'
});


Router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!store.getters.isLoggedIn) {
            next({
                path: '/',
                //query: { redirect: to.fullPath }
            })
        }
        else {
            next()
        }
    }
    else {
        next() // make sure to always call next()!
    }
});

export default Router;

