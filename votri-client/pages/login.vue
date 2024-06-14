<script setup lang="ts">
definePageMeta({
  layout: "auth",
  auth: {
    unauthenticatedOnly: true,
    navigateAuthenticatedTo: "/"
  },
  middleware: ["auth"]
});

// Stores
// ...

// Composable
useHead({
  title: "Login"
});

const { signIn } = useAuth();
const route = useRoute();
const config = useRuntimeConfig();

// Props
//...

// Data
// ...

// Computed
// ...

// Event
// ...

// Methods
const login = async () => {
  const previousUrl = String(route.query.callbackUrl);
  const params = new URLSearchParams({ previousUrl }).toString();
  const callbackurl = `${config.public.baseUrl}/login-success?${ params }`;

  await signIn("google", { redirect: false, callbackUrl: callbackurl });
};

// Hooks
// ...
</script>

<template>
  <section class="h-screen flex">
    <div class="w-1/2 h-full bg-black p-8 flex flex-col justify-between items-start">
      <NuxtLink to="/" class="flex items-center gap-2">
        <img class="h-6 w-6" src="~/assets/images/logo.png" alt="logo">
        <span class="text-base font-bold text-white">votri</span>
      </NuxtLink>

      <p class="text-white text-xl">
        “Your daily dev tools collection”
      </p>
    </div>

    <div class="w-1/2 h-full flex flex-col items-center justify-center">
      <div class="relative flex justify-center text-xs uppercase mb-4">
        <span class="bg-background px-2 text-muted-foreground">
          continue with
        </span>
      </div>
      <Button variant="outline" type="button" class="px-8" @click="login">
        <Icon name="logos:google-icon" class="w-5 h-5 mr-2"/>
        Google
      </Button>
      <p class="px-8 text-center text-sm text-muted-foreground mt-2">
        By clicking continue, you agree to our<br>
        <NuxtLink
          to="/terms"
          class="underline underline-offset-4 hover:text-primary"
        >
          Terms of Service
        </NuxtLink>
        and
        <NuxtLink
          to="/privacy"
          class="underline underline-offset-4 hover:text-primary"
        >
          Privacy Policy
        </NuxtLink>
        .
      </p>
    </div>
  </section>
</template>

<style scoped>

</style>
