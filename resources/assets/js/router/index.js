import Vue from 'vue';
import Router from 'vue-router';
import Weather from "../components/Weather";
import Orders from "../components/Orders";

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
      component: Orders
    }
  ],
  mode: 'history',
});
