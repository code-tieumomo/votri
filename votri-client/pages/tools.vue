<script setup lang="ts">


// Stores
// ...

// Composable
useSeoMeta({
  title: "Tools"
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
    <div class="max-w-4xl mx-auto mt-8">
      <h1 class="font-bold text-xl">
        All tools are here
      </h1>

      <div class="grid grid-cols-3 gap-4 mt-4">
        <NuxtLink to="/class-prefixer">
          <Card class="hover:shadow-xl transition duration-500">
            <CardContent class="p-4">
              <div class="font-semibold flex items-center gap-2">
                <Icon name="carbon:data-class" class="h-5 w-5"/>
                Class Prefixer
              </div>
              <p class="mt-4 text-gray-600">
                Add a prefix to all classes in your HTML code snippet.
              </p>
            </CardContent>
          </Card>
        </NuxtLink>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
