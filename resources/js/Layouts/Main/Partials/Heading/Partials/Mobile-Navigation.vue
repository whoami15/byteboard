<script setup></script>

<template>
  <div class="space-y-1 pb-3 pt-2">
    <ResponsiveNavLink
      :href="route('topics.index')"
      :active="route().current('topics.index')"
      class="block border-l-4 py-2 pl-3 pr-4 text-base"
    >
      Topics
    </ResponsiveNavLink>

    <ResponsiveNavLink
      href="#"
      class="block border-l-4 py-2 pl-3 pr-4 text-base"
    >
      Tags
    </ResponsiveNavLink>

    <ResponsiveNavLink
      href="#"
      class="block border-l-4 py-2 pl-3 pr-4 text-base"
    >
      Users
    </ResponsiveNavLink>

    <ResponsiveNavLink
      href="#"
      class="block border-l-4 py-2 pl-3 pr-4 text-base"
    >
      Groups
    </ResponsiveNavLink>
  </div>
</template>
