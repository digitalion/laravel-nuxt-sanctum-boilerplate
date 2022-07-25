export default ({ app }, inject) => {
  var ui = {
    colors: {
      default: "#03f",
      disabled: "#adb5bd",
      question: "#0077b6",
      info: "#11cdef",
      success: "#2dce89",
      warning: "#ffd600",
      danger: "#f5365c",
    },
  };

  inject("ui", ui);
};
