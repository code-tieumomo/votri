<script setup lang="ts">
import { Label } from "~/components/ui/label";
import { Textarea } from "~/components/ui/textarea";
import { Button } from "~/components/ui/button";
import { toast } from "~/components/ui/toast";
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow
} from "@/components/ui/table";
import { ScrollArea } from "@/components/ui/scroll-area";
import { ScrollBar } from "~/components/ui/scroll-area";

// Stores
// ...

// Composable
const { public: env } = useRuntimeConfig();

useHead({
  title: "SELECT Result Formatter"
});

// Props
//...

// Data
const result = ref("");
const isVisualizing = ref(false);
const errorToast = ref(null);
const columnNames = ref([]);
const data = ref([]);

// Computed
// ...

// Event
// ...

// Methods
const submit = async () => {
  try {
    isVisualizing.value = true;
    const response = await $fetch(`${ env.apiEndpoint }/api/select-result`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      body: {
        result: result.value
      }
    });

    columnNames.value = response.columnNames;
    data.value = response.data;
  } catch (error: any) {
    errorToast.value = toast({
      title: "Uh oh! Something went wrong.",
      description: error.data.message,
      variant: "destructive"
    });
  } finally {
    isVisualizing.value = false;
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
          <Icon name="carbon:data-base" class="h-5 w-5"/>
          <span>SELECT Result Formatter</span>
        </h1>

        <p class="text-sm text-gray-400">
          Visualize the result of your SELECT query in a table.
        </p>
      </div>

      <div class="mt-8">
        <Label>
          Your SELECT query result
        </Label>
        <Textarea placeholder="+------- ..." class="!w-full mt-1" v-model="result" @focus="errorToast?.dismiss()"/>
      </div>

      <div class="mt-4">
        <Button class="ml-auto block" size="sm" @click="submit" :disabled="isVisualizing">
          <div class="flex items-center gap-2">
            Visualize
          </div>
        </Button>
      </div>

      <div class="mt-8" v-if="columnNames.length > 0 || data.length > 0">
        <ScrollArea class="border rounded-md w-full whitespace-nowrap">
          <Table>
            <TableHeader>
              <TableRow>
                <TableHead v-for="col in columnNames">
                  <span class="font-bold">{{ col }}</span>
                </TableHead>
              </TableRow>
            </TableHeader>
            <TableBody>
              <TableRow v-for="(row, idx) in data" :key="idx">
                <TableCell v-for="value in row" class="whitespace-nowrap">
                  {{ value }}
                </TableCell>
              </TableRow>
            </TableBody>
          </Table>
          <ScrollBar orientation="horizontal"/>
        </ScrollArea>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
