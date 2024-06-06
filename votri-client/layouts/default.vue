<script setup lang="ts">
import { Input } from "~/components/ui/input";
import { Toaster } from "~/components/ui/toast";

// Stores
// ...

// Composable
// ...

// Props
//...

// Data
// ...

// Computed
// ...

// Event
// ...

// Methods
// ...

// Hooks
// ...
</script>

<template>
  <main>
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
