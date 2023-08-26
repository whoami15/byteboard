<script setup>
import { DisclosureButton } from "@headlessui/vue";
import { BellIcon } from "@heroicons/vue/24/outline";

const logout = () => {
  router.post(route("logout"));
};
</script>

<template>
  <div class="flex items-center px-4">
    <div class="shrink-0">
      <img
        class="h-10 w-10 rounded-full"
        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
        alt=""
      />
    </div>

    <div class="ml-3">
      <div class="text-base font-medium text-gray-800">Tom Cook</div>

      <div class="text-sm text-gray-500">tom@example.com</div>
    </div>

    <button
      type="button"
      class="relative ml-auto shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
    >
      <span class="absolute -inset-1.5" />

      <span class="sr-only">View notifications</span>

      <BellIcon class="h-6 w-6" aria-hidden="true" />
    </button>
  </div>

  <div class="mt-3 space-y-1">
    <DisclosureButton
      as="a"
      href="#"
      class="block px-4 py-2 text-base text-gray-500 hover:bg-gray-100 hover:text-gray-800"
      >Your Profile</DisclosureButton
    >

    <DisclosureButton
      as="a"
      href="#"
      class="block px-4 py-2 text-base text-gray-500 hover:bg-gray-100 hover:text-gray-800"
      >Settings</DisclosureButton
    >

    <form @submit.prevent="logout">
      <button
        type="submit"
        class="block px-4 py-2 text-base text-gray-500 hover:bg-gray-100 hover:text-gray-800"
      >
        Sign out
      </button>
    </form>
  </div>
</template>
