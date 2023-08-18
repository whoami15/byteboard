<script setup>
import Navigation from "./Partials/Navigation.vue";
import MobileNavigation from "./Partials/Mobile-Navigation.vue";
import Search from "./Partials/Search.vue";
import ProfileDropdown from "./Partials/Profile-Dropdown.vue";
import MobileProfileDropdown from "./Partials/Mobile-Profile-Dropdown.vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";
import { Bars3Icon, BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";
</script>

<template>
  <Disclosure
    v-slot="{ open }"
    as="nav"
    class="border-b border-t-[3px] border-t-blue-600 bg-white"
  >
    <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
      <div class="flex h-16 justify-between">
        <div class="flex px-2 lg:px-0">
          <div class="flex shrink-0 items-center">
            <ApplicationLogo class="h-8 w-auto" />
          </div>

          <Navigation />
        </div>

        <Search />

        <div class="flex items-center lg:hidden">
          <!-- Mobile menu button -->
          <DisclosureButton
            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
          >
            <span class="absolute -inset-0.5" />

            <span class="sr-only">Open main menu</span>

            <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />

            <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
          </DisclosureButton>
        </div>

        <div class="hidden lg:flex lg:items-center">
          <button
            v-if="$page.props.auth.user"
            type="button"
            class="relative ml-2 shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            <span class="absolute -inset-1.5" />

            <span class="sr-only">View notifications</span>

            <BellIcon class="h-6 w-6" aria-hidden="true" />
          </button>

          <template v-if="$page.props.auth.user">
            <ProfileDropdown />
          </template>

          <div v-else>
            <Link
              :href="route('login')"
              class="inline-flex items-center rounded-sm bg-sky-100 px-3 py-2 text-sm text-sky-700 shadow-sm hover:bg-sky-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            >
              Login
            </Link>

            <Link
              :href="route('register')"
              class="ml-2 inline-flex items-center rounded-sm bg-blue-400 px-3 py-2 text-sm text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            >
              Sign up
            </Link>
          </div>
        </div>
      </div>
    </div>

    <DisclosurePanel class="lg:hidden">
      <MobileNavigation />

      <div class="border-t border-gray-200 pb-3 pt-4">
        <template v-if="$page.props.auth.user">
          <MobileProfileDropdown />
        </template>

        <template v-else>
          <div class="flex items-center px-4">
            <Link
              :href="route('login')"
              class="rounded-sm bg-sky-100 px-3 py-2 text-sm text-sky-700 shadow-sm hover:bg-sky-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            >
              Login
            </Link>

            <Link
              :href="route('login')"
              class="relative ml-auto shrink-0 rounded-sm bg-blue-400 px-3 py-2 text-sm text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            >
              Sign up
            </Link>
          </div>
        </template>
      </div>
    </DisclosurePanel>
  </Disclosure>
</template>
