<script setup></script>

<template>
  <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
    <NavLink
      :href="route('topics.index')"
      :active="route().current('topics.index')"
      class="inline-flex items-center border-b-2 px-1 pt-1 text-sm"
    >
      Topics
    </NavLink>

    <NavLink
      href="#"
      class="inline-flex items-center border-b-2 px-1 pt-1 text-sm"
    >
      Tags
    </NavLink>

    <NavLink
      href="#"
      class="inline-flex items-center border-b-2 px-1 pt-1 text-sm"
    >
      Projects
    </NavLink>

    <NavLink
      href="#"
      class="inline-flex items-center border-b-2 px-1 pt-1 text-sm"
    >
      Calendar
    </NavLink>
  </div>
</template>
