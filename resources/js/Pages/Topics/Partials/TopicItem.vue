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
        class="text-lg text-blue-500 hover:text-blue-600"
      >
        {{ topic.title }}
      </Link>

      <div class="flex items-center gap-3">
        <small class="text-gray-700">{{ topic.votes_count }} votes</small>

        <small class="text-gray-500">{{ topic.comments_count }} comments</small>

        <small class="text-gray-500">{{ topic.views }} views</small>
      </div>
    </div>

    <p class="text-sm">{{ topic.excerpt }}</p>

    <div class="mt-2">
      <span
        v-for="tag in topic.tags"
        :key="tag.id"
        class="mr-2 inline-flex items-center rounded-sm bg-blue-100 px-2 py-1 text-xs text-blue-800"
      >
        {{ tag.name }}
      </span>
    </div>

    <div class="mt-2 flex items-center justify-end">
      <img
        class="mr-1 inline-block h-5 w-5 rounded-md"
        :src="topic.user.profile_photo_url"
        alt=""
      />

      <small>
        {{ topic.user.name }}

        <span class="text-gray-500">
          posted
          {{ fromNow(topic.created_at) }}
        </span>
      </small>
    </div>
  </div>
</template>
