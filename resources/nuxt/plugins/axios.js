import AxiosLogger from "@lollipop-onl/axios-logger";
import { onErrorCaptured } from "vue";

export default function ({ $axios, $toast, isDev, isServer, app }) {
  const logger = new AxiosLogger({
    isServer,
    quiet: !isDev,
  });

  $axios.setHeader("Content-Type", "application/json");
  $axios.setHeader("Accept", "application/json");

  $axios.onRequest((config) => {});

  $axios.onResponse((response) => {
    logger.log(response);

    var message = "";
    if (response && response.data && response.data.message != "")
      message = response.data.message;
    if (message && message.length > 0) {
      $toast.success(message);
    }
  });

  $axios.onError((error) => {
    logger.log(error);

    if (error && error.response && error.response.data) {
      const response = error.response.data;
      const code = parseInt(response.code);

      var message = "";
      if (response && response.message != "") message = response.message;
      if (message && message.length > 0) {
        $toast.error(message);
      }

      switch (code) {
        case 401:
        case 403:
          // app.store.dispatch("auth/logout");
          break;

        case 422:
          app.$errors.fill(response.errors);
          break;
      }
    }
  });
}
