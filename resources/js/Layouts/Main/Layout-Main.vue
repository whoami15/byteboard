<script setup>
import Header from "./Partials/Heading/Header.vue";
</script>

<template>
  <div>
    <div class="min-h-screen">
      <Header />

      <main>
        <slot />
      </main>
    </div>
  </div>
</template>
