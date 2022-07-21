import Swal from "sweetalert2";

const swalConfig = {
  toast: true,
  position: "bottom-right",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  iconColor: "white",
  customClass: {
    popup: "colored-toast",
  },
};

export default ({ app }, inject) => {
  const toast = {
    name: "Toast",

    success(message) {
      this.fire(message, "success");
    },
    error(message) {
      this.fire(message, "error");
    },

    fire(message, icon) {
      Swal.fire({
        ...swalConfig,
        text: message,
        icon: icon,
      });
    },
  };

  inject("toast", toast);
};
