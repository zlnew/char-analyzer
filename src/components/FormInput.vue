<script setup lang="ts">
import { useId } from 'vue'

defineProps<{
  type: 'text' | 'number' | 'email' | 'password'
  label: string
  autocomplete?: string
}>()

const id = useId()
const model = defineModel<string | number>()
</script>

<template>
  <label :for="id">
    <span>{{ label }}</span>
    <input
      :id="id"
      v-model="model"
      :type="type"
      class="w-full rounded"
      :autocomplete="autocomplete"
    />
  </label>
</template>
