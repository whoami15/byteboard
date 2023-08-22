<script setup>
const props = defineProps({
  topic: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div class="px-4 py-3 text-gray-900">
    <div class="flex flex-col items-center justify-between sm:flex-row">
      <Link
        :href="route('topics.show', [topic, topic.slug])"
        class="flex-1 self-start hyphens-auto break-words text-lg leading-tight text-blue-500 hover:text-blue-600"
      >
        {{ topic.title }}
      </Link>

      <div
        class="-order-1 ml-0 flex items-center gap-3 self-start sm:ml-2 md:order-none"
      >
        <span class="text-xs text-gray-700">
          {{ topic.total_votes }}
          {{ pluralize(topic.total_votes, "vote") }}
        </span>

        <span class="text-xs text-gray-500">
          {{ topic.answers_count }}
          {{ pluralize(topic.answers_count, "answer") }}
        </span>

        <span class="text-xs text-gray-500">
          {{ topic.views }}
          {{ pluralize(topic.views, "view") }}
        </span>
      </div>
    </div>

    <p class="mt-2 line-clamp-2 hyphens-auto break-words text-sm text-zinc-700">
      {{ topic.excerpt }}
    </p>

    <div
      class="mt-2 flex flex-wrap items-center justify-between gap-y-2 text-zinc-800"
    >
      <div class="flex flex-wrap gap-1">
        <span
          v-for="tag in topic.tags"
          :key="tag.id"
          class="mr-1 inline-flex cursor-pointer items-center rounded-sm bg-blue-50 px-2 py-1 text-xs text-blue-700 hover:bg-blue-100 hover:text-blue-800"
        >
          {{ tag.name }}
        </span>
      </div>

      <div class="ml-auto justify-end">
        <div class="flex items-center">
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
    </div>
  </div>
</template>
