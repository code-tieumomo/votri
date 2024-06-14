<script setup lang="ts">
import {
  Dialog,
  DialogContent,
  DialogDescription, DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger
} from "~/components/ui/dialog";
import { Skeleton } from "~/components/ui/skeleton";

definePageMeta({
  middleware: ["auth"]
});

// Stores
// ...

// Composable
useHead({
  title: "Task Crusher"
});

const config = useRuntimeConfig();
const { data: auth } = useAuth();

// Props
//...

// Data
const { data: profile, error: errorProfile, pending: pendingProfile } = await useFetch(`${config.public.apiEndpoint}/api/user`, {
  headers: {
    "Content-Type": "application/json",
    "Accept": "application/json"
  },
  credentials: "include"
}).catch((error) => error.data);

const { data: tasks, error: errorTasks, pending: pendingTasks } = await useFetch(`${config.public.apiEndpoint}/api/tasks`, {
  headers: {
    "Content-Type": "application/json",
    "Accept": "application/json"
  },
  credentials: "include"
}).catch((error) => error.data);
console.log(tasks.value);

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
  <section class="max-w-4xl mx-auto my-8">
    <div class="flex items-center justify-between">
      <h1 class="font-bold text-xl flex items-center gap-2">
        <Icon name="solar:gamepad-linear" class="h-5 w-5"/>
        Task Crusher
      </h1>

      <p class="text-sm text-gray-400">
        Complete your tasks in a gamified way.
      </p>
    </div>

    <div class="grid grid-cols-4 w-full gap-4 mt-8">
      <div class="col-span-3">
        <Card>
          <CardContent class="p-4">
            <h2 class="font-bold">Tasks</h2>

            <Dialog>
              <DialogTrigger as="div">
                <Button class="mt-4 w-full justify-between text-gray-400" variant="outline">
                  Add new task ...

                  <kbd
                    class="pt-0.5 items-center pointer-events-none select-none gap-1 rounded border border-border font-medium min-h-5 h-5 bg-muted px-1.5 font-mono text-[11px] opacity-100 flex">
                    Ctrl + N
                  </kbd>
                </Button>
              </DialogTrigger>
              <DialogContent>
                <DialogHeader>
                  <DialogTitle>Edit profile</DialogTitle>
                  <DialogDescription>
                    Make changes to your profile here. Click save when you're done.
                  </DialogDescription>
                </DialogHeader>

                <DialogFooter>
                  Save changes
                </DialogFooter>
              </DialogContent>
            </Dialog>

            <div class="flex items-center mt-4 gap-2" v-for="i in 2" :key="i">
              <Skeleton class="h-12 w-12 rounded-full"/>
              <div class="space-y-2 grow">
                <Skeleton class="h-4 w-full"/>
                <Skeleton class="h-4 w-3/4"/>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>

      <div class="col-span-1">
        <Card>
          <CardContent class="p-4">
            <h2 class="font-bold">Profile</h2>

            <Transition name="page" mode="out-in">
              <div class="flex flex-col space-y-3 mt-4" v-if="pendingProfile">
                <Skeleton class="h-[125px] w-full rounded-xl"/>
                <div class="space-y-2">
                  <Skeleton class="h-4 w-full"/>
                  <Skeleton class="h-4 w-3/4"/>
                </div>
              </div>
              <div v-else class="mt-4">
                <div class="flex gap-4 items-center">
                  <img src="~/assets/images/badge1.svg" alt="" class="w-10 h-10">
                  <div class="flex flex-col">
                    <div class="text-sm font-bold">Level: {{ profile.level }}</div>
                    <div class="text-xs text-gray-400">XP: {{ profile.experience }}</div>
                  </div>
                </div>
              </div>
            </Transition>
          </CardContent>
        </Card>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
