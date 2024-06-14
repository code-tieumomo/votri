// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  ssr: true,
  app: {
    pageTransition: { name: "page", mode: "out-in" }
  },
  runtimeConfig: {
    nuxtSecret: process.env.NUXT_SECRET,
    google: {
      clientId: process.env.GOOGLE_CLIENT_ID,
      clientSecret: process.env.GOOGLE_CLIENT_SECRET
    },
    public: {
      baseUrl: process.env.BASE_URL,
      apiEndpoint: process.env.API_ENDPOINT
    }
  },
  devtools: { enabled: true },
  modules: ["@nuxtjs/tailwindcss", "shadcn-nuxt", "nuxt-icon", "@sidebase/nuxt-auth"],
  tailwindcss: {
    cssPath: "~/assets/css/app.scss"
  },
  shadcn: {
    prefix: "",
    componentDir: "./components/ui"
  },
  auth: {
    provider: {
      type: "authjs"
    },
    globalAppMiddleware: {
      isEnabled: false
    }
  }
});
