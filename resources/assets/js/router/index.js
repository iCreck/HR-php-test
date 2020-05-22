import Vue from 'vue';
import Router from 'vue-router';
import Weather from '../components/Weather';
import Orders from '../components/Orders';
import Products from '../components/Products';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Weather,
    },
    {
      path: '/orders',
      name: 'orders',
      component: Orders,
    },
    {
      path: '/products/page/:page',
      name: 'products',
      component: Products,
      props: true,
    },
    {
      path: '*',
      redirect: '/',
    },
  ],
  mode: 'history',
});
