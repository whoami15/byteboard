<script setup>
import { Head } from "@inertiajs/vue3";
import TopicItem from "./Partials/TopicItem.vue";
import { PlusIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
  topics: {
    type: Object,
    default: () => ({}),
  },
});
</script>

<template>
  <Head title="Topics" />

  <LayoutMain>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Topics</h2>
    </template>

    <div class="py-4">
      <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="relative mt-0 px-5 sm:mt-6 sm:px-0">
          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200" />
          </div>

          <div class="relative flex items-center justify-between">
            <span
              class="bg-white pr-3 text-2xl font-medium leading-6 text-gray-900"
              >All Topics</span
            >

            <button
              type="button"
              class="inline-flex items-center gap-x-1.5 rounded-sm bg-blue-500 px-3 py-2 text-sm text-white hover:bg-blue-600"
            >
              <PlusIcon
                class="-ml-1 -mr-0.5 h-5 w-5 text-white"
                aria-hidden="true"
              />

              <span>Post Topic</span>
            </button>
          </div>
        </div>

        <div
          v-if="topics.data.length"
          class="mt-6 divide-y border-x-0 border-y bg-white sm:border-x"
        >
          <TopicItem
            v-for="topic in topics.data"
            :key="topic.id"
            :topic="topic"
          />

          <Pagination :data="topics" />
        </div>
      </div>
    </div>
  </LayoutMain>
</template>
