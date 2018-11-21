import VueRouter from 'vue-router';
// Pages
import Home from './components/pages/Home'
import Listings from './components/pages/Listings'
import Business from './components/pages/Business'

import UserAccount from './components/User/UserAccount'
import UserBusiness from './components/User/UserBusiness'
import UserForm from './components/User/UserForm'
import Bookmarks from './components/User/Bookmarks'
import store from './store'
import {getAuthUser} from './helpers/auth'

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
            },
            {
                path: 'user',
                component: UserForm,
                name: 'userForm',
                meta: {title: 'Account'}
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

        getAuthUser().then(res => {
            if(res.data.user) {
                next()
            }
            else {
                next({
                    path: '/',
                    //query: { redirect: to.fullPath }
                })
            }

        }).catch(error => {

            next({
                path: '/',
                //query: { redirect: to.fullPath }
            })
        })
        /*
        if (!store.state.isLoggedIn) {
            next({
                path: '/',
                //query: { redirect: to.fullPath }
            })
        }
        else {
            next()
        }
        */
    }
    else {
        next() // make sure to always call next()!
    }
});

export default Router;

