import Vue from 'vue';
import Vuex from 'vuex';
import weather from './weather';
import orders from './orders';
import products from './products';
import partners from './partners';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    weather,
    orders,
    products,
    partners,
  },
});
