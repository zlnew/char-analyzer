<script setup lang="ts">
import Auth from '@/api/Auth'
import FormInput from '@/components/FormInput.vue'
import PrimaryButton from '@/components/PrimaryButton.vue'
import useAuthStore from '@/stores/auth'
import { reactive } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const authStore = useAuthStore()

const form = reactive<RegistrationForm>({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const register = async () => {
  try {
    await Auth.register(form)
    const user = await Auth.user<User>()

    if (user) {
      authStore.user = user
      router.push({ name: 'home' })
    }
  } catch (error) {
    const apiError = error as Error
    alert(apiError.message)
  }
}
</script>

<template>
  <div class="p-4 rounded border max-w-xs w-full bg-white">
    <div class="text-lg font-bold">Register</div>

    <form class="mt-4 flex flex-col gap-4" @submit.prevent="register">
      <FormInput v-model="form.name" type="text" label="Name" autocomplete="name" />
      <FormInput v-model="form.email" type="email" label="Email" autocomplete="email" />
      <FormInput
        v-model="form.password"
        type="password"
        label="Password"
        autocomplete="new-password"
      />
      <FormInput
        v-model="form.password_confirmation"
        type="password"
        label="Confirm your password"
        autocomplete="new-password"
      />

      <PrimaryButton type="submit" label="Register" />
    </form>

    <div class="mt-2 text-center">
      <RouterLink :to="{ name: 'auth.login' }">Already have an account?</RouterLink>
    </div>
  </div>
</template>
