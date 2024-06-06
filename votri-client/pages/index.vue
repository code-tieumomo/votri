<script setup lang="ts">
import { Badge } from "~/components/ui/badge";
import { Button } from "~/components/ui/button";

// Stores
// ...

// Composable
useSeoMeta({
  title: "Homepage"
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
</script>

<template>
  <section>
    <section>
      <div class="mx-auto flex max-w-6xl flex-col items-center py-24">
        <NuxtLink to="/tools">
          <Badge variant="secondary" class="gap-2">
            <Icon name="mingcute:sparkles-2-fill" class="h-5 w-5 text-yellow-400"/>
            New feature: Tailwind Prefixer
            <Icon name="tabler:chevron-right" class="h-4 w-4 text-gray-600"/>
          </Badge>
        </NuxtLink>

        <h1 class="mt-4 text-center text-6xl font-bold">
          Your daily dev tools collection
        </h1>

        <p class="mt-4 text-center text-lg text-gray-600">
          This is a collection of tools that I have created to help me in my daily work.<br>
          I hope you find them useful too.<br>
          If you have any suggestions or feedback, please let me know.
        </p>

        <div class="mt-8 flex items-center justify-center gap-2">
          <NuxtLink to="/tools">
            <Button>
              <Icon class="mr-2 h-4 w-4" name="heroicons:arrow-right-start-on-rectangle-16-solid"/>
              Get started
            </Button>
          </NuxtLink>

          <NuxtLink to="/feature-request">
            <Button variant="outline">
              <Icon class="mr-2 h-4 w-4" name="material-symbols:edit-square-outline"/>
              Feature request
            </Button>
          </NuxtLink>
        </div>
      </div>
    </section>

    <section class="max-h-[calc(100vh-527px)] overflow-hidden">
      <div class="border rounded-xl max-w-6xl mx-auto overflow-hidden shadow-2xl">
        <img src="~/assets/images/hero.png" alt="">
      </div>
    </section>
  </section>
</template>
