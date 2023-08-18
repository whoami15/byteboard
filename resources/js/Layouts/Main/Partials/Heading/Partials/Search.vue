<script setup>
import { MagnifyingGlassIcon } from "@heroicons/vue/20/solid";
</script>

<template>
  <div
    class="flex flex-1 items-center justify-center px-2 lg:ml-6 lg:justify-end"
  >
    <div class="w-full max-w-lg lg:max-w-xs">
      <label for="search" class="sr-only">Search</label>

      <div class="relative">
        <div
          class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
        >
          <MagnifyingGlassIcon
            class="h-5 w-5 text-gray-400"
            aria-hidden="true"
          />
        </div>

        <input
          id="search"
          name="search"
          class="block w-full rounded-sm border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6"
          placeholder="Search"
          type="search"
        />
      </div>
    </div>
  </div>
</template>
