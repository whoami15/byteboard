<script setup>
const props = defineProps({
  comments: {
    type: Object,
    default: () => ({}),
  },
});
</script>

<template>
  <div class="mt-6 divide-y divide-[#f1f2f3] border-t border-t-zinc-200">
    <div
      v-for="comment in comments"
      :key="comment.id"
      class="ml-6 py-[6px] text-xs leading-5 text-zinc-800"
    >
      <span
        class="prose max-w-none break-words text-xs text-zinc-800 prose-code:font-mono prose-pre:font-mono"
        v-html="comment.body"
      ></span>

      –&nbsp;<span class="text-blue-500 hover:text-blue-700">
        {{ comment.user.name }}
      </span>

      <span class="text-gray-400">
        &nbsp;{{ formatToRelative(comment.created_at, "MMM D, YYYY H:mm") }}
      </span>
    </div>
  </div>
</template>
