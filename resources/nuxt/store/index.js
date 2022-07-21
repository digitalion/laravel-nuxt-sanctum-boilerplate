import utilVuex from "@/utils/vuex";
import _ from "lodash";

const initialState = () => ({});

export default _.merge(utilVuex, {
  state: () => initialState(),

  mutations: {
    RESET_STATE(state) {
      Object.assign(state, initialState());
    },
  },
});
