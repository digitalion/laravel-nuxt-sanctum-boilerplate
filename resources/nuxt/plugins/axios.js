import AxiosLogger from "@lollipop-onl/axios-logger";

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
        if (response.data && response.data.message != "")
            message = response.data.message;
        if (message != "") {
            $toast.success(message);
        }
    });

    $axios.onError((error) => {
        logger.log(error);

        const response = error.response.data;
        const code = parseInt(response.code);

        var message = "";
        if (response && response.message != "") message = response.message;
        if (message != "") {
            $toast.error(message);
        }

        switch (code) {
            case 401:
            case 403:
                // app.store.dispatch("account/logout");
                break;

            case 422:
                app.$errors.fill(response.errors);
                break;
        }
    });
}
