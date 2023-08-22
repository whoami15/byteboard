<script setup>
import { formatDate } from "@vueuse/core";
import CommentTree from "../Partials/CommentTree.vue";

const props = defineProps({
  comments: {
    type: Object,
    default: () => ({}),
  },
});
</script>

<template>
  <div class="mt-6 divide-y divide-gray-100 border-t border-t-gray-200">
    <div
      v-for="comment in comments"
      :key="comment.id"
      class="ml-6 break-words py-[6px] text-xs leading-5 text-zinc-800"
    >
      <p>
        {{ comment.body }}
        –&nbsp;<span class="text-blue-500 hover:text-blue-700">
          {{ comment.user.name }}
        </span>

        <span class="text-gray-400">
          &nbsp;{{ formatToRelative(comment.created_at, "MMM D, YYYY H:mm") }}
        </span>
      </p>
    </div>
  </div>
</template>
