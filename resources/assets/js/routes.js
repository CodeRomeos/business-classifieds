import VueRouter from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('./components/pages/Home')
	},
	{
		path: '/categories',
		component: require('./components/pages/Categories')
	},
	{
		path: '/list-your-business',
		component: require('./components/pages/ListYourBusiness')
	},
	{
		path: '/login',
		component: require('./components/pages/Login')
	}
];

export default new VueRouter({
	routes,
	linkActiveClass: 'active',
	mode: 'history'
})