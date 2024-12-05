<script setup lang="ts">
defineProps<{
  type: 'submit' | 'button' | 'reset'
  label: string
  block?: boolean
}>()
</script>

<template>
  <button
    :type="type"
    class="py-2 px-3 bg-red-500 rounded text-white disabled:opacity-50"
    :class="{ 'w-full': block }"
  >
    {{ label }}
  </button>
</template>
