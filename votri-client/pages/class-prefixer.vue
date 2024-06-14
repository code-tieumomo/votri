<script setup lang="ts">
import { Codemirror } from "vue-codemirror";
import { html } from "@codemirror/lang-html";
import { githubLightInit } from "@uiw/codemirror-theme-github";
import { Label } from "~/components/ui/label";
import { Input } from "~/components/ui/input";
import { useToast } from "~/components/ui/toast";
import type { Ref } from "vue";
import { Alert, AlertDescription, AlertTitle } from "~/components/ui/alert";

interface ClassPrefixResponse {
  code: string;
}

// Stores
// ...

// Composable
useSeoMeta({
  title: "Class Prefixer"
});

const { toast, dismiss } = useToast();
const { public: env } = useRuntimeConfig();

// Props
//...

// Data
const errorToast: Ref = ref(null);
const isPrefixing = ref(false);
const prefix = ref("");
const code = ref("");
const themeConfig = ref({
  settings: {
    fontFamily: "'JetBrains Mono', monospace",
    fontSize: "14px"
  }
});

// Computed
// ...

// Events
// ...

// Methods
const submit = async () => {
  try {
    isPrefixing.value = true;
    const response: ClassPrefixResponse = await $fetch(`${ env.apiEndpoint }/api/class-prefix`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      body: {
        code: code.value,
        prefix: prefix.value
      }
    });
    code.value = response.code;
  } catch (error: any) {
    errorToast.value = toast({
      title: "Uh oh! Something went wrong.",
      description: error.data.message,
      variant: "destructive"
    });
  } finally {
    isPrefixing.value = false;
  }
};

// Hooks
// ...
</script>

<template>
  <section>
    <div class="max-w-4xl mx-auto my-8">
      <div class="flex items-center justify-between">
        <h1 class="font-bold text-xl flex items-center gap-2">
          <Icon name="carbon:data-class" class="h-5 w-5"/>
          Class Prefixer
        </h1>

        <p class="text-sm text-gray-400">
          Add a prefix to all classes in your HTML code snippet.
        </p>
      </div>

      <Alert class="mt-8">
        <Icon name="ph:terminal-bold" class="h-4 w-4"/>
        <AlertTitle>Heads up!</AlertTitle>
        <AlertDescription>
          A prefix will be added to all classes in your HTML code snippet, not just Tailwind classes.
          However, it can serve as a Tailwind class prefixer.
          All special cases like <code>!w-full</code>, <code>hover:w-full</code> or <code>[&_div]:w-full</code>
          will be handled.
        </AlertDescription>
      </Alert>

      <div class="grid w-full tems-center gap-1.5 mt-8">
        <Label>Your prefix</Label>
        <Input type="text" placeholder="tw-" class="!w-full" v-model="prefix" @focus="errorToast?.dismiss()"/>
      </div>

      <div class="grid w-full tems-center gap-1.5 mt-4" v-once>
        <Label>Your HTML code</Label>
        <div class="border shadow rounded-lg overflow-hidden">
          <codemirror
            :readonly="isPrefixing"
            v-model="code"
            :style="{ height: '300px' }"
            :extensions="[html(), githubLightInit(themeConfig)]"
            placeholder="<!-- Your HTML code here -->"
            @focus="errorToast?.dismiss()"
          ></codemirror>
        </div>
      </div>

      <div class="mt-4">
        <Button class="ml-auto block" size="sm" @click="submit" :disabled="isPrefixing">
          <div class="flex items-center gap-2">
            Add prefix
          </div>
        </Button>
      </div>
    </div>
  </section>
</template>

<style scoped>
</style>
