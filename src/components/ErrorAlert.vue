<script setup lang="ts">
defineProps<{
  message: string
}>()

defineEmits(['hide'])
</script>

<template>
  <div class="p-4 rounded border border-red-500 bg-red-200 flex items-start justify-between gap-4">
    <span>{{ message }}</span>
    <button type="button" @click="$emit('hide')">&#x2715;</button>
  </div>
</template>
