export default {
  mutations: {
    // RESET_STATE(state) {
    //   Object.assign(state, () => {});
    // },
  },

  actions: {
    stateReset({ commit }) {
      commit("RESET_STATE");
    },
    appLoading({ commit }, payload) {
      commit("app/SET_LOADING", payload ?? false, { root: true });
    },
  },

  getters: {},
};
