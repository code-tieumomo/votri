<script setup lang="ts">
// Stores
// ...

// Composable
useSeoMeta({
  title: "About Us"
});

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
import { Button } from "~/components/ui/button";
import { Badge } from "~/components/ui/badge";
import { Card, CardContent, CardHeader } from "~/components/ui/card";
</script>

<template>
  <section class="min-h-[calc(100vh-57px)] flex items-center justify-center">
    <div class="grid grid-cols-12 gap-4 w-full max-w-4xl mx-auto">
      <Card class="col-span-6">
        <CardContent class="p-4 flex gap-4 items-center">
          <img src="~/assets/images/me.jpg" alt="" class="aspect-square object-cover object-bottom rounded-md w-1/3">
          <div class="grow">
            <span class="text-md uppercase text-gray-400 font-semibold">
              Maintainer
            </span>
            <h1 class="text-3xl font-bold">quanph</h1>
            <p class="text-sm mt-2 pr-4 text-gray-400">
              I am a developer who loves to create web applications.
            </p>
          </div>
        </CardContent>
      </Card>
      <Card class="col-span-3">
        <CardContent class="p-4">
          <NuxtLink to="/" class="flex items-center gap-2">
            <img class="h-6 w-6" src="~/assets/images/logo.png" alt="logo">
            <span class="text-xl font-bold">votri</span>
          </NuxtLink>
          <p class="text-sm mt-4 text-gray-400">
            This is a collection of tools that I have created to help me in my daily work. I hope you find them useful too.
          </p>
        </CardContent>
      </Card>
      <Card class="col-span-3">
        <CardContent class="p-4">
          <h2 class="text-xl font-bold">Contribute</h2>
          <p class="text-sm mt-4 text-gray-400">
            If you have any suggestions,
            please let me know by creating a
            <NuxtLink to="/feature-request" class="font-semibold underline">feature request</NuxtLink>
            or an issue on
            <a href="https://github.com/code-tieumomo" class="font-semibold underline" target="_blank">GitHub</a>.
          </p>
        </CardContent>
      </Card>
      <Card class="col-span-full">
        <CardContent class="p-4">
          <h2 class="text-xl font-bold">
            Tech stack of this project
          </h2>
          <p class="text-sm mt-4 text-gray-400 space-x-4">
            <Icon name="skill-icons:nuxtjs-light" class="w-8 h-8"></Icon>
            <Icon name="skill-icons:pinia-light" class="w-8 h-8"></Icon>
            <Icon name="skill-icons:tailwindcss-light" class="w-8 h-8"></Icon>
            <Icon name="skill-icons:vite-light" class="w-8 h-8"></Icon>
            <Icon name="skill-icons:supabase-light" class="w-8 h-8"></Icon>
            <Icon name="skill-icons:laravel-light" class="w-8 h-8"></Icon>
            <Icon name="skill-icons:mysql-light" class="w-8 h-8"></Icon>
          </p>
        </CardContent>
      </Card>
    </div>
  </section>
</template>

<style scoped>

</style>
