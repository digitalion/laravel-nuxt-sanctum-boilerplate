const laravelNuxt = require("laravel-nuxt");

module.exports = laravelNuxt({
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,

  // Target: https://go.nuxtjs.dev/config-target
  target: "static",

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "starter",
    htmlAttrs: {
      lang: "it",
    },
    meta: [
      { charset: "utf-8" },
      {
        name: "viewport",
        content: "width=device-width, initial-scale=1, shrink-to-fit=no",
      },
      { hid: "description", name: "description", content: "" },
      { hid: "author", name: "author", content: "" },
      { name: "format-detection", content: "telephone=no" },
    ],
    link: [
      { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
      { rel: "preconnect", href: "https://fonts.googleapis.com" },
      {
        rel: "preconnect",
        href: "https://fonts.gstatic.com",
        crossorigin: true,
      },
      {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap",
      },
      {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css2?family=Roboto&display=swap",
      },
    ],
    script: [
      {
        src: "https://polyfill.io/v3/polyfill.min.js?features=es6",
        body: true,
      },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [{ src: "~/assets/scss/bootstrap.scss", lang: "sass" }],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    "~/plugins/toast",
    "~/plugins/axios",
    { src: "~/plugins/bootstrap.js", mode: "client" },
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [],

  loading: {
    color: "#3f0",
  },

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    "@nuxtjs/axios",
    "@nuxtjs/auth",
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    baseURL: process.env.MIX_BASE_URL,
    credentials: true,
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
      "Access-Control-Allow-Origin": "*",
      "X-Requested-With": "XMLHttpRequest",
    },
  },

  sweetalert: {
    reverseButtons: true,
    // confirmButtonColor: utilUi.colors.success,
    confirmButtonText: "Si",
    // cancelButtonColor: utilUi.colors.disabled,
    cancelButtonText: "Annulla",
  },

  auth: {
    localStorage: false,
    watchLoggedIn: true,
    strategies: {
      // cookie: {
      //   cookie: {
      //     name: "XSRF-TOKEN",
      //   },
      // },
      laravelSanctum: {
        provider: "laravel/sanctum",
        url: process.env.MIX_API_URL,
        endpoints: {
          login: {
            url: "/api/auth/login",
            method: "post",
            propertyName: "data.token",
          },
          user: { url: "/api/auth/me", method: "get", propertyName: "data" },
          logout: { url: "/api/auth/logout", method: "get" },
          csrf: { url: "/api/sanctum/csrf-cookie" },
        },
        user: {
          property: "data",
        },
        tokenRequired: false,
        tokenType: false,
      },
      local: {
        token: {
          property: "data.token",
          global: true,
          required: true,
          type: "Bearer",
        },
        user: {
          property: false,
          // autoFetch: true,
        },
        endpoints: {
          login: {
            url: "/api/auth/login",
            method: "post",
            withCredentials: true,
            propertyName: "data.token",
          },
          user: {
            url: "/api/auth/me",
            method: "get",
            withCredentials: true,
            propertyName: "data",
          },
          logout: {
            url: "/api/auth/logout",
            method: "get",
            withCredentials: true,
          },
          csrf: { url: "/api/auth/csrf-cookie" },
        },
        tokenRequired: true,
        tokenType: "Bearer",
      },
    },
    redirect: {
      login: "/auth/login",
      logout: "/auth/login",
      callback: false,
      home: false,
    },
  },

  router: {
    base: "/",
    linkExactActiveClass: "active",
    middleware: ["auth"],
    // extendRoutes(routes, resolve) {
    //     routes
    //         .push
    //         // {
    //         //   name: "impianti-sezioni",
    //         //   path: "/impianti/:impianto/sezione/:id",
    //         //   component: resolve(__dirname, "pages/impianti/sezioni/_id.vue")
    //         // },
    //         // {
    //         //   name: "impianti-sezioni-origin",
    //         //   path: "/impianti/:impianto/sezione/:sezione/origin/:id",
    //         //   component: resolve(__dirname, "pages/impianti/sezioni/origin/_id.vue")
    //         // },
    //         ();
    // },
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    loaders: {
      vue: {
        compilerOptions: {
          whitespace: "condense",
          preserveWhitespace: false,
        },
      },
      sass: {
        implementation: require("sass"),
      },
      scss: {
        implementation: require("sass"),
      },
    },
  },
});
