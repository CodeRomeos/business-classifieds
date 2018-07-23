import VueRouter from 'vue-router';
// Pages
import Home from './components/pages/Home'
import Listings from './components/pages/Listings'
import Business from './components/pages/Business'

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
	}
];

const Router = new VueRouter({
    routes,
    mode: 'history'
});


Router.beforeEach((to, from, next) => {
    document.title = to.meta.title

    next()
});

export default Router;

