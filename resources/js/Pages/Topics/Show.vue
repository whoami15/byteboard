<script setup>
import { Head } from "@inertiajs/vue3";
import TopicAction from "./Partials/TopicAction.vue";
import CommentTree from "./Partials/CommentTree.vue";

const props = defineProps({
  topic: {
    type: Object,
    default: () => ({}),
  },
});

const castVote = (type) => {
  router.post(
    route("topics.vote", [props.topic, props.topic.slug]),
    {
      type: type,
    },
    {
      preserveScroll: true,
    },
  );
};
</script>

<template>
  <Head :title="props.topic.title" />

  <LayoutMain>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ props.topic.title }}
      </h2>
    </template>

    <div class="py-4">
      <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
        <div class="mt-0 px-2 sm:mt-6 md:px-5">
          <div class="flex flex-col justify-between sm:flex-row">
            <span
              class="flex-1 break-words bg-white pr-0 text-2xl font-normal leading-7 text-zinc-700 sm:pr-3"
            >
              {{ props.topic.title }}
            </span>

            <button
              type="button"
              class="-order-1 mb-3 inline-flex h-[min-content] items-center gap-x-1.5 self-end rounded-sm bg-blue-500 px-3 py-2 text-sm text-white hover:bg-blue-600 sm:mb-0 sm:self-auto md:order-none"
            >
              Post Topic
            </button>
          </div>

          <div class="mt-3 flex border-b border-b-zinc-200 pb-5 text-zinc-800">
            <div
              class="mr-4 flex text-xs leading-none"
              :title="formatLocalTimestampToUtc(props.topic.created_at)"
            >
              <span class="mr-1 text-gray-500">Posted</span>

              <time
                itemprop="dateCreated"
                :datetime="
                  formatToRelative(
                    props.topic.created_at,
                    'YYYY-MM-DDTHH:mm:ss',
                  )
                "
              >
                {{ fromNow(props.topic.created_at) }}
              </time>
            </div>

            <div
              class="mr-4 flex text-xs leading-none"
              :title="formatLocalTimestampToUtc(props.topic.updated_at)"
            >
              <span class="mr-1 text-gray-500">Modified</span>

              <span>
                {{ fromNow(props.topic.updated_at) }}
              </span>
            </div>

            <div class="mr-4 flex text-xs leading-none">
              <span class="mr-1 text-gray-500">Viewed</span>

              <span>{{ props.topic.views }} times</span>
            </div>
          </div>

          <div class="mt-4">
            <div class="flex flex-row items-start justify-between pr-4">
              <TopicAction :data="topic" @vote-casted="castVote" />

              <div>
                <div class="prose break-words text-zinc-800">
                  {{ props.topic.body }}
                </div>

                <div class="mt-6 flex flex-wrap gap-1">
                  <span
                    v-for="tag in props.topic.tags"
                    :key="tag.id"
                    class="mr-1 inline-flex cursor-pointer items-center rounded-sm bg-blue-50 px-2 py-1 text-xs text-blue-700 hover:bg-blue-100 hover:text-blue-800"
                  >
                    {{ tag.name }}
                  </span>
                </div>

                <CommentTree :comments="props.topic.comments" />
              </div>
            </div>

            <div
              v-for="answer in props.topic.answers"
              :key="answer.id"
              class="my-6 flex flex-row items-start justify-between border-t border-t-gray-200 pr-4 pt-4"
            >
              <TopicAction :data="answer" @vote-casted="castVote" />

              <div>
                <div class="answer">{{ answer.body }}</div>

                <CommentTree :comments="answer.comments" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </LayoutMain>
</template>
