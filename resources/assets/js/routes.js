import VueRouter from 'vue-router';

// Pages
import Home from './components/pages/Home'
import Categories from './components/pages/Categories'
import ListYourBusiness from './components/pages/ListYourBusiness'
import Login from './components/pages/Login'

let routes = [
	{
		path: '/',
		component: Home
	},
	{
		path: '/categories',
		component: Categories
	},
	{
		path: '/list-your-business',
		component: ListYourBusiness
	},
	{
		path: '/login',
		component: Login
	}
];

export default new VueRouter({
	routes,
	linkActiveClass: 'active',
	mode: 'history'
})