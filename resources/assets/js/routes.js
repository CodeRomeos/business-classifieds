import VueRouter from 'vue-router';
// Pages
import Home from './components/pages/Home'
import Listings from './components/pages/Listings'

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
	}
];

export default new VueRouter({
    routes,
    mode: 'history'
});
