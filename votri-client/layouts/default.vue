<script setup lang="ts">
import { Input } from "~/components/ui/input";
import { Toaster } from "~/components/ui/toast";
</script>

<template>
  <div class="min-h-screen flex flex-col">
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

    <main class="grow">
      <slot/>
    </main>

    <footer class="border-t text-xs shadow-sm">
      <div class="container py-4 text-center text-gray-600 flex items-center justify-between">
        <p>&copy; 2024 votri. All rights reserved.</p>
        <p>Created by <a href="https://quanph.dev" target="_blank" class="font-bold">quanph</a></p>
      </div>
    </footer>

    <Toaster/>
  </div>
</template>

<style scoped>
.router-link-active {
  @apply font-bold;
}
</style>
