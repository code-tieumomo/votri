<script setup lang="ts">
import { Input } from "~/components/ui/input";
import { Toaster, useToast } from "~/components/ui/toast";
import {
  DropdownMenu,
  DropdownMenuContent, DropdownMenuItem,
  DropdownMenuLabel, DropdownMenuSeparator,
  DropdownMenuTrigger
} from "~/components/ui/dropdown-menu";

// Stores
// ...

// Composable
const { data, signOut } = useAuth();
const config = useRuntimeConfig();
const { toast } = useToast();

// Props
//...

// Data
const fetchingUser = ref(!!data.value?.user);

// Computed
// ...

// Event
// ...

// Methods
const getGmailName = (email: string | null | undefined) => {
  return email?.split("@")[0] || "";
};

const logout = async () => {
  await signOut();
  toast({
    title: "Logged out",
    description: "You have been successfully logged out."
  });
};

// Hooks
onMounted(async () => {
  if (fetchingUser.value) {
    await useFetch(`${config.public.apiEndpoint}/api/user`, {
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      credentials: "include",
      async onResponseError({ request, response, options }) {
        if (response.status === 401) {
          toast({
            title: "Unauthorized",
            description: "Your session has expired. Please log in again to continue using the required authentication features.",
            variant: "destructive"
          });
          await signOut();
        }
      }
    }).finally(() => {
      fetchingUser.value = false;
    })
  }
});
</script>

<template>
  <main class="relative">
    <Transition name="page" mode="out-in">
      <div v-if="fetchingUser" class="w-screen h-screen bg-white flex flex-col items-center justify-center fixed inset-0 z-50">
        <div class="flex flex-col items-center">
          <Icon name="svg-spinners:3-dots-move" class="w-10 h-10 text-gray-400"></Icon>
        </div>
      </div>
    </Transition>
    <header class="border-b text-sm shadow-sm">
      <div class="container flex h-14 items-center justify-between">
        <div class="flex gap-8">
          <NuxtLink to="/" class="flex items-center gap-2">
            <img class="h-6 w-6" src="~/assets/images/logo.png" alt="logo">
            <span class="text-base font-bold">votri</span>
          </NuxtLink>

          <nav class="flex items-center gap-4 text-gray-600">
            <NuxtLink class="leading-none hover:underline" to="/tools">Tools</NuxtLink>
            <NuxtLink class="leading-none hover:underline" to="/about-us">About us</NuxtLink>
          </nav>
        </div>

        <div class="flex items-center gap-4">
          <div class="relative w-full max-w-sm">
            <Input id="search" type="text" placeholder="Search..." class="h-8 pr-10"/>
            <span class="absolute inset-y-0 flex items-center justify-center px-2 end-0">
              <Icon name="tabler:heart-search" class="h-5 w-5 text-gray-600"/>
            </span>
          </div>

          <a href="https://github.com/code-tieumomo" target="_blank">
            <Icon name="tabler:brand-github" class="h-6 w-6 text-gray-600"/>
          </a>

          <DropdownMenu v-if="data?.user">
            <DropdownMenuTrigger as="div" class="cursor-pointer">
              <div class="flex items-center gap-2">
                <div class="flex flex-col items-end">
                  <span class="text-xs text-gray-600 font-semibold">{{ data?.user?.name }}</span>
                  <span class="text-xs text-gray-400">{{ getGmailName(data?.user?.email) }}</span>
                </div>
                <div class="w-8 h-8">
                  <img :src="data?.user?.image || ''" class="rounded-full shrink-0" alt="">
                </div>
              </div>
            </DropdownMenuTrigger>
            <DropdownMenuContent>
              <DropdownMenuLabel>Account</DropdownMenuLabel>
              <DropdownMenuSeparator/>
              <DropdownMenuItem @click="logout">Logout</DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
        </div>
      </div>
    </header>

    <slot/>

    <Toaster/>
  </main>
</template>

<style scoped>
.router-link-active {
  @apply font-bold;
}
</style>
