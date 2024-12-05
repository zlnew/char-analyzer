<script setup lang="ts">
import CharMatch from '@/api/CharMatch'
import AppSection from '@/components/AppSection.vue'
import FormInput from '@/components/FormInput.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'
import { reactive, ref } from 'vue'

const matchPercentage = ref<number | null>(null)
const analyzed = ref(false)
const loading = ref(false)

const form = reactive<CharMatchRequest>({
  input_one: '',
  input_two: '',
})

const analyze = async () => {
  analyzed.value = false
  loading.value = true

  try {
    const charAnalysis = await CharMatch.analyze<CharAnalysis>(form)

    if (charAnalysis) {
      matchPercentage.value = charAnalysis?.percentage
      analyzed.value = true
    }
  } catch (error) {
    const apiError = error as Error
    alert(apiError.message)
  } finally {
    loading.value = false
  }
}

const analyzeAgain = () => {
  analyzed.value = false
  form.input_one = ''
  form.input_two = ''
}
</script>

<template>
  <div>
    <AppSection>
      <div class="bg-white border rounded p-4">
        <div class="font-semibold">Analyze Character Match Between Two Input</div>

        <form class="mt-8 flex flex-col gap-4" @submit.prevent="analyze">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <FormInput
              v-model="form.input_one"
              type="text"
              label="Input 1"
              placeholder="Input something&hellip;"
              required
            />
            <FormInput
              v-model="form.input_two"
              type="text"
              label="Input 2"
              placeholder="Input something&hellip;"
              required
            />
          </div>

          <template v-if="analyzed">
            <div class="text-center text-green-600">
              Character match is {{ `${matchPercentage}%` }}
            </div>
            <PrimaryButton type="button" label="Analyze Again" @click="analyzeAgain" />
          </template>

          <PrimaryButton
            v-else
            type="submit"
            :label="loading ? 'Analyzing&hellip;' : 'Analyze'"
            :disabled="loading"
          />
        </form>
      </div>
    </AppSection>

    <AppSection>
      <div class="bg-white border rounded">
        <div class="p-4">
          <div class="font-semibold">Recent Analyses</div>
        </div>

        <table class="w-full">
          <thead>
            <tr>
              <th>#</th>
              <th>Input One</th>
              <th>Input Two</th>
              <th>Match Percentage</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </AppSection>
  </div>
</template>
