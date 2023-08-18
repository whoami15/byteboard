<script setup>
const props = defineProps({
  topic: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div class="px-5 py-3 text-gray-900">
    <div class="flex items-center justify-between">
      <Link
        :href="route('topics.show', [topic, topic.slug])"
        class="text-lg text-blue-600 hover:text-blue-500"
      >
        {{ topic.title }}
      </Link>

      <div class="flex items-center gap-3">
        <small class="text-gray-700">{{ topic.votes_count }} votes</small>

        <small class="text-gray-500">{{ topic.comments_count }} comments</small>

        <small class="text-gray-500">{{ topic.views }} views</small>
      </div>
    </div>

    <p class="mt-2">{{ topic.excerpt }}</p>

    <span
      v-for="tag in topic.tags"
      :key="tag.id"
      class="mr-2 mt-2 inline-flex items-center rounded-sm bg-blue-100 px-2 py-1 text-xs text-blue-800"
    >
      {{ tag.name }}
    </span>

    <div class="flex justify-end">
      <span class="mt-2 block text-sm">- {{ topic.user.name }}</span>
    </div>
  </div>
</template>
