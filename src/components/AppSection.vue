<script setup lang="ts">
defineProps<{
  noPaddingTop?: boolean
}>()
</script>

<template>
  <section :class="{ 'mt-8': !noPaddingTop }">
    <slot />
  </section>
</template>
