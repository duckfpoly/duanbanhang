export default {
  // ssr: false,
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "ndcake",
    htmlAttrs: {
      lang: "en",
    },
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" },
      { name: "format-detection", content: "telephone=no" },
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }],
    script: [
      // core
      { src: "/js/core/popper.min.js", body: true },
      { src: "/js/core/bootstrap.min.js", body: true },
      { src: "/js/core/bootstrap.bundle.min.js", body: true },
      // plugins
      { src: "/js/plugins/perfect-scrollbar.min.js", body: true },
      { src: "/js/plugins/smooth-scrollbar.min.js", body: true },
      // other
      { src: "/js/argon-dashboard.js", body: true },
    ],
    noscript: [
      {
        innerHTML: "This site requires JavaScript to be enabled.",
        body: true,
      },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    "element-ui/lib/theme-chalk/index.css",
    "~assets/css/bootstrap.min.css",
    "~assets/css/argon-dashboard.min.css",
    "~assets/css/nucleo-icons.css",
    "~assets/css/nucleo-svg.css",
    "~assets/css/items/courses.css",
    "~assets/css/items/styles.css",
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: "@/plugins/element-ui", mode: "client" },
    { src: "@/plugins/api.js" },
    // { src: '@/plugins/sweetalert.js', mode: 'client' }

  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: ["@nuxtjs/composition-api/module"],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: ["@nuxtjs/axios",'cookie-universal-nuxt'],

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    transpile: [/^element-ui/],
  },

  axios: {
    baseURL: process.env.BASE_URL_API,
  },

};
