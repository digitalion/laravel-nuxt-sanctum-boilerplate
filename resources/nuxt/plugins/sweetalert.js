import Swal from "sweetalert2";

const configToast = {
  showConfirmButton: false,
  position: "bottom-right",
  timer: 3000,
  timerProgressBar: true,
  toast: true,
  iconColor: "white",
  color: "white",
  customClass: {
    popup: "colored-toast",
  },
};

var configSwal = {
  showConfirmButton: true,
  confirmButtonText: "Yes",
  showCancelButton: true,
  cancelButtonText: "No",
};

export default ({ app, $ui }, inject) => {
  const toast = {
    name: "Toast",

    success(message) {
      this.fire(message, {
        icon: "success",
        background: $ui.colors.success,
      });
    },
    error(message) {
      this.fire(message, {
        icon: "error",
        background: $ui.colors.danger,
      });
    },

    fire(message, config = {}) {
      Swal.fire({
        ...configToast,
        ...config,
        text: message,
      });
    },
  };
  inject("toast", toast);

  configSwal = {
    ...configSwal,
    confirmButtonColor: $ui.colors.success,
    cancelButtonColor: $ui.colors.disabled,
  };
  const swal = {
    name: "Swal",

    success(message) {
      this.fire(message, { icon: "success" });
    },
    error(message) {
      this.fire(message, { icon: "error" });
    },
    async question(message) {
      return await Swal.fire({
        ...configSwal,
        ...{
          confirmButtonColor: $ui.colors.danger,
        },
        text: message,
        icon: "question",
      });
    },

    fire(message, icon, config = {}) {
      Swal.fire({
        ...configSwal,
        ...config,
        text: message,
        icon: icon,
      });
    },
  };
  inject("swal", swal);
};
