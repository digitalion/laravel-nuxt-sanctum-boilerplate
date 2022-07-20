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
                content:
                    "width=device-width, initial-scale=1, shrink-to-fit=no",
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
    ],

    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {
        // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
        baseURL: "/",
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
