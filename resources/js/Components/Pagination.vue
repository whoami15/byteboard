<script setup>
import { Link } from "@inertiajs/vue3";
import { usePaginator } from "momentum-paginator";
import {
  ArrowLongLeftIcon,
  ArrowLongRightIcon,
} from "@heroicons/vue/24/outline/index.js";

const props = defineProps({
  data: {
    type: Object,
    default: () => ({}),
  },
});

const { pages, previous, next } = usePaginator(props.data);
</script>

<template>
  <nav
    v-if="props.data.data.length"
    class="mt-4 flex items-center justify-between border-t border-gray-200 px-5"
  >
    <div class="group">
      <div
        v-if="previous.isActive"
        class="-mt-px h-px w-0 bg-black transition-[width] group-hover:w-full"
      ></div>

      <Component
        :is="previous.isActive ? Link : 'span'"
        :href="previous.url"
        class="inline-flex items-center gap-3 py-3 text-sm font-medium transition"
        :class="[
          previous.isActive
            ? 'text-gray-500 hover:text-black'
            : 'cursor-default text-gray-300',
        ]"
      >
        <ArrowLongLeftIcon class="h-5 w-5" />

        <span>Previous</span>
      </Component>
    </div>

    <div class="hidden md:flex">
      <div v-for="(page, index) in pages" :key="index">
        <div v-if="page.isPage" class="group">
          <div
            class="-mt-px h-px bg-black transition-[width]"
            :class="[page.isCurrent ? 'w-full' : 'w-0 group-hover:w-full']"
          ></div>

          <Link
            :href="page.url"
            class="block px-4 py-3 text-sm transition"
            :class="[
              page.isCurrent ? 'text-black' : 'text-gray-500 hover:text-black',
            ]"
            >{{ page.label }}</Link
          >
        </div>

        <div v-else class="px-3.5 py-3 text-sm font-medium text-gray-500">
          ...
        </div>
      </div>
    </div>

    <div class="group">
      <div
        v-if="next.isActive"
        class="-mt-px h-px w-0 bg-black transition-[width] group-hover:w-full"
      ></div>

      <Component
        :is="next.isActive ? Link : 'span'"
        :href="next.url"
        class="inline-flex items-center gap-3 py-3 text-sm font-medium transition"
        :class="[
          next.isActive
            ? 'text-gray-500 hover:text-black'
            : 'cursor-default text-gray-300',
        ]"
      >
        <span>Next</span>

        <ArrowLongRightIcon class="h-5 w-5" />
      </Component>
    </div>
  </nav>
</template>
