import VueRoute from 'vue-router';

let routes = [
	{
		path: '/',
		component: require('./components/pages/Home')
	}
];

export default new VueRouter({
	routes
})