<script setup lang="ts">
import Auth from '@/api/Auth'
import ErrorAlert from '@/components/ErrorAlert.vue'
import FormInput from '@/components/FormInput.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'
import useAuthStore from '@/stores/auth'
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const authStore = useAuthStore()

const loading = ref(false)
const errorMessage = ref<string | null>(null)

const credential = reactive<LoginCredential>({
  email: '',
  password: '',
})

const authenticate = async () => {
  loading.value = true

  try {
    await Auth.login(credential)
    const user = await Auth.user<User>()

    if (user) {
      authStore.user = user
      router.push({ name: 'home' })
    }
  } catch (error) {
    const apiError = error as Error
    errorMessage.value = apiError.message
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <div class="p-4 rounded border max-w-xs w-full bg-white">
    <div class="text-lg font-bold">Login</div>

    <form class="mt-4 flex flex-col gap-4" @submit.prevent="authenticate">
      <ErrorAlert v-if="errorMessage" :message="errorMessage" @hide="errorMessage = null" />

      <FormInput
        v-model="credential.email"
        type="email"
        label="Email"
        autocomplete="username"
        required
      />
      <FormInput
        v-model="credential.password"
        type="password"
        label="Password"
        autocomplete="current-password"
        required
      />

      <PrimaryButton
        type="submit"
        :label="loading ? 'Authenticating&hellip;' : 'Login'"
        :disabled="loading"
        block
      />
    </form>

    <div class="mt-2 text-center">
      <RouterLink :to="{ name: 'auth.register' }">Don't have an account?</RouterLink>
    </div>
  </div>
</template>
