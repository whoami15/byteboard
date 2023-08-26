<script setup>
import { onMounted, ref } from "vue";

defineProps({
  modelValue: {
    type: String,
    required: true,
  },
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <input
    ref="input"
    class="block w-full rounded-sm border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-zinc-950/10 placeholder:text-gray-400 autofill:outline autofill:outline-1 autofill:outline-blue-500 focus:outline focus:outline-4 focus:outline-blue-100/70 focus:ring-blue-500 sm:text-sm sm:leading-6"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
  />
</template>
