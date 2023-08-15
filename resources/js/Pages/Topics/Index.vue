<script setup>
import { Head } from "@inertiajs/vue3";
import TopicItem from "./Partials/TopicItem.vue";

const props = defineProps({
  topics: {
    type: Array,
    default: () => [],
  },
});
</script>

<template>
  <Head title="Topics" />

  <LayoutMain>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Topics</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="mt-6 divide-y bg-white shadow-sm">
          <TopicItem v-for="topic in topics" :key="topic.id" :topic="topic" />
        </div>
      </div>
    </div>
  </LayoutMain>
</template>
