// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    pageTransition: { name: "page", mode: "out-in" }
  },
  runtimeConfig: {
    public: {
      apiEndpoint: process.env.API_ENDPOINT
    }
  },
  devtools: { enabled: false },
  modules: ["@nuxtjs/tailwindcss", "shadcn-nuxt", "nuxt-icon"],
  tailwindcss: {
    cssPath: "~/assets/css/app.scss"
  },
  shadcn: {
    prefix: "",
    componentDir: "./components/ui"
  }
});
