<script setup>
const props = defineProps({
  topic: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div class="p-6 text-gray-900">
    <div class="flex items-center justify-between">
      <Link
        :href="route('topics.show', [topic, topic.slug])"
        class="text-lg text-blue-600 hover:text-blue-500"
      >
        {{ topic.title }}
      </Link>

      <div class="flex items-center gap-3">
        <small class="text-gray-500">{{ topic.views }} views</small>

        <small class="text-gray-500">{{ topic.votes_count }} votes</small>
      </div>
    </div>

    <span class="block text-sm">- {{ topic.user.name }}</span>

    <p class="mt-4">{{ topic.excerpt }}</p>
  </div>
</template>
