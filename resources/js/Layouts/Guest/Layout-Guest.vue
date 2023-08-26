<script setup>
import Header from "../Partials/Heading/Header.vue";
</script>

<template>
  <Header />

  <div
    class="flex min-h-full flex-1 flex-col justify-center py-12 sm:px-6 lg:px-8"
  >
    <slot />
  </div>
</template>
