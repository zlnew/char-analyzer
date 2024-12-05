<script setup lang="ts">
import { useId } from 'vue'

defineProps<{
  type: 'text' | 'number' | 'email' | 'password'
  label: string
  autocomplete?: string
  placeholder?: string
  required?: boolean
}>()

const id = useId()
const model = defineModel<string | number>()
</script>

<template>
  <label :for="id" class="space-y-2">
    <span>{{ label }}</span>
    <input
      :id="id"
      v-model="model"
      :type="type"
      class="w-full rounded"
      :autocomplete="autocomplete"
      :placeholder="placeholder"
      :required="required"
    />
  </label>
</template>
