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
    ? "bg-blue-50 border-blue-500 text-blue-700 transition duration-150 ease-in-out"
    : "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 transition duration-150 ease-in-out",
);
</script>

<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>
