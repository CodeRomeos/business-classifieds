import VueRouter from 'vue-router';
// Pages
import Home from './components/pages/Home'
import Listings from './components/pages/Listings'
import Business from './components/pages/Business'

let routes = [
	{
		path: '/',
        component: Home,
        name: 'home'
    },
    {
		path: '/listings',
        component: Listings,
        name: 'listings'
	},
	{
		path: '/listings/:businessid',
		component: Business,
		name: 'business'
	}
];

export default new VueRouter({
    routes,
    mode: 'history'
});
