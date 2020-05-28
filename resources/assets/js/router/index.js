import Vue from 'vue';
import Router from 'vue-router';
import Weather from '../components/Weather';
import Orders from '../components/Orders';
import Products from '../components/Products';
import Edit from '../components/Orders/Edit';

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
      path: '/orders/:id',
      name: 'editOrder',
      component: Edit,
      props: true,
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
