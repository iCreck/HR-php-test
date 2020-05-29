export default {
  namespaced: true,
  state: {
    overlay: false,
  },
  mutations: {
    setOverlay(state, payload) {
      setTimeout(() => {
        state.overlay = payload.value;
      }, payload.timeout);
    },
  },
  actions: {
    setOverlay({ commit }, payload) {
      commit('setOverlay', payload);
    },
  },
  getters: {
    overlay(state) {
      return state.overlay;
    },
  },
};
