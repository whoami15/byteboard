<script setup>
import { computed } from "vue";

const props = defineProps({
  checked: {
    type: [Array, Boolean],
    required: true,
  },
  value: {
    default: null,
  },
});

const emit = defineEmits(["update:checked"]);

const proxyChecked = computed({
  get() {
    return props.checked;
  },

  set(val) {
    emit("update:checked", val);
  },
});
</script>

<template>
  <input
    v-model="proxyChecked"
    type="checkbox"
    :value="value"
    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
  />
</template>
