<script setup lang="ts">
import CharAnalysis from '@/api/CharAnalysis'
import CharMatch from '@/api/CharMatch'
import AppSection from '@/components/AppSection.vue'
import ErrorAlert from '@/components/ErrorAlert.vue'
import FormInput from '@/components/FormInput.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'
import RedButton from '@/components/RedButton.vue'
import { onMounted, reactive, ref, watch } from 'vue'

const charAnalyses = ref<CharAnalysis[]>([])
const matchPercentage = ref<number | null>(null)
const errorMessage = ref<string | null>(null)
const analyzed = ref(false)
const loading = ref(false)
const refetch = ref(false)

const form = reactive<CharMatchRequest>({
  input_one: '',
  input_two: '',
})

watch(refetch, (newRefetch) => {
  if (newRefetch) {
    getCharAnalyses()
  }
})

onMounted(() => {
  getCharAnalyses()
})

const getCharAnalyses = async () => {
  refetch.value = false

  try {
    const data = await CharAnalysis.get<CharAnalysis[]>()

    if (data) {
      charAnalyses.value = data
    }
  } catch (error) {
    const apiError = error as Error
    alert(apiError.message)
  }
}

const deleteCharAnalysis = async (resourceId: number) => {
  const confirmed = confirm('Are you sure want to delete this analysis?')

  if (!confirmed) {
    return
  }

  try {
    const response = await CharAnalysis.destroy<ApiResponse>(resourceId)

    if (response) {
      alert(response.message)
      refetch.value = true
    }
  } catch (error) {
    const apiError = error as Error
    alert(apiError.message)
  }
}

const analyze = async () => {
  analyzed.value = false
  loading.value = true

  try {
    const charAnalysis = await CharMatch.analyze<CharAnalysis>(form)

    if (charAnalysis) {
      matchPercentage.value = charAnalysis?.percentage
      analyzed.value = true
      refetch.value = true
    }
  } catch (error) {
    const apiError = error as Error
    errorMessage.value = apiError.message
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
          <ErrorAlert v-if="errorMessage" :message="errorMessage" @hide="errorMessage = null" />

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
      <div class="bg-white border rounded overflow-x-auto">
        <div class="p-4">
          <div class="font-semibold">Recent Analyses</div>
        </div>

        <table v-if="charAnalyses.length" class="w-full">
          <thead>
            <tr>
              <th>#</th>
              <th>Input One</th>
              <th>Input Two</th>
              <th>Match Percentage</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(item, index) in charAnalyses" :key="index">
              <td class="align-middle">{{ index + 1 }}</td>
              <td class="align-middle">{{ item.input_one }}</td>
              <td class="align-middle">{{ item.input_two }}</td>
              <td class="align-middle">{{ `${item.percentage}%` }}</td>
              <td class="align-middle text-end">
                <RedButton type="button" label="Delete" @click="deleteCharAnalysis(item.id)" />
              </td>
            </tr>
          </tbody>
        </table>

        <div v-else class="m-4 p-4 bg-yellow-100 text-center rounded">No recent analyses</div>
      </div>
    </AppSection>
  </div>
</template>
