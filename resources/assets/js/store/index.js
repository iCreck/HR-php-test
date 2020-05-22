import Vue from 'vue';
import Vuex from 'vuex';
import weather from './weather';
import orders from './orders';
import products from './products';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    weather,
    orders,
    products,
  },
});
