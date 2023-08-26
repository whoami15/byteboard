<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";

const logout = () => {
  router.post(route("logout"));
};
</script>

<template>
  <Menu as="div" class="relative ml-4 shrink-0">
    <div>
      <MenuButton
        class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
      >
        <span class="absolute -inset-1.5" />

        <span class="sr-only">Open user menu</span>

        <img
          class="h-8 w-8 rounded-full"
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt=""
        />
      </MenuButton>
    </div>

    <transition
      enter-active-class="transition ease-out duration-100"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <MenuItems
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-sm bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
      >
        <MenuItem v-slot="{ active }">
          <a
            href="#"
            class="block px-4 py-2 text-sm text-gray-700"
            :class="[active ? 'bg-gray-100' : '']"
            >Your Profile</a
          >
        </MenuItem>

        <MenuItem v-slot="{ active }">
          <a
            href="#"
            class="block px-4 py-2 text-sm text-gray-700"
            :class="[active ? 'bg-gray-100' : '']"
            >Settings</a
          >
        </MenuItem>

        <MenuItem v-slot="{ active }">
          <form @submit.prevent="logout">
            <button
              type="submit"
              class="block px-4 py-2 text-sm text-gray-700"
              :class="[active ? 'bg-gray-100' : '']"
            >
              Sign out
            </button>
          </form>
        </MenuItem>
      </MenuItems>
    </transition>
  </Menu>
</template>
