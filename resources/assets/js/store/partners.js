import axios from 'axios';

export default {
  namespaced: true,
  state: {
    partners: [],
  },
  mutations: {
    setPartners(state, payload) {
      state.partners = payload;
    },
  },
  actions: {
    async fetchPartners({ commit }) {
      const response = await axios.get('/api/partners');
      commit('setPartners', response.data);
    },
  },
  getters: {
    partners(state) {
      return state.partners;
    },
  },
};
