<script setup>
import { ChevronUpIcon } from "@heroicons/vue/24/outline";
import { ChevronDownIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});

const emit = defineEmits(["voteCasted"]);

const vote = (type) => {
  console.log("vote type:" + type);
  emit("voteCasted", type);
};
</script>

<template>
  <div class="flex flex-col items-center pr-4">
    <button
      type="button"
      class="rounded-full border p-2 text-gray-700 hover:bg-green-100"
      @click="vote('upvote')"
    >
      <ChevronUpIcon class="h-6 w-6" />
    </button>

    <span class="py-2 text-xl font-medium text-gray-900">
      {{ props.data.total_votes }}
    </span>

    <button
      type="button"
      class="rounded-full border p-2 text-gray-700 hover:bg-gray-100"
      @click="vote('downvote')"
    >
      <ChevronDownIcon class="h-6 w-6" />
    </button>
  </div>
</template>
