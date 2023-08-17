<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  href: {
    type: String,
    required: true,
  },
  active: {
    type: Boolean,
  },
});

const classes = computed(() =>
  props.active
    ? "border-blue-500 text-gray-900 transition duration-150 ease-in-out"
    : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 transition duration-150 ease-in-out",
);
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
