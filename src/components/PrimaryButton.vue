<script setup lang="ts">
defineProps<{
  type: 'submit' | 'button' | 'reset'
  label: string
}>()
</script>

<template>
  <button :type="type" class="w-full p-2 bg-blue-500 rounded text-white">{{ label }}</button>
</template>
