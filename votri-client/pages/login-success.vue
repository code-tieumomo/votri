<script setup lang="ts">
import axios from "axios";
import { useToast } from "~/components/ui/toast";

definePageMeta({
  layout: "auth",
  middleware: ["auth"]
})

// Stores
// ...

// Composable
useHead({
  title: "Login Success"
})

const config = useRuntimeConfig();
const { data, getSession, signOut } = useAuth();
const { toast } = useToast();
const route = useRoute();
const router = useRouter();

// Props
//...

// Data
const session = await getSession();
const previousUrl = route.query.previousUrl ? new URL(String(route.query.previousUrl)) : new URL("/")

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

// Computed
// ...

// Event
// ...

// Methods
// ...

interface LoginResponse {
  token: string;
}

// Hooks
onMounted(async () => {
  if (session) {
    try {
      axios.get(`${config.public.apiEndpoint}/sanctum/csrf-cookie`).then(async () => {
        const response: LoginResponse = await axios.post(`${config.public.apiEndpoint}/api/auth/login`, session, {
          headers: {
            "Content-Type": "application/json"
          },
          withCredentials: true
        });
        await router.push(previousUrl.pathname);
      });
    } catch (error: any) {
      toast({
        title: "Error",
        description: error.response.data.message,
        variant: "destructive"
      });
      await signOut();
      await router.push(previousUrl.pathname);
    }
  }
})
</script>

<template>
  <section class="w-screen h-screen flex items-center justify-center">
    <div class="flex flex-col items-center">
      <Icon name="svg-spinners:3-dots-move" class="w-10 h-10 text-gray-400"></Icon>
    </div>
  </section>
</template>

<style scoped>

</style>
