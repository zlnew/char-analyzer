<script setup lang="ts">
import Auth from '@/api/Auth'
import useAuthStore from '@/stores/auth'
import { useRouter } from 'vue-router'

const router = useRouter()
const authStore = useAuthStore()

const logout = async () => {
  try {
    await Auth.logout()

    authStore.user = {} as User
    router.push({ name: 'auth.login' })
  } catch (error) {
    const apiError = error as Error
    alert(apiError.message)
  }
}
</script>

<template>
  <div>
    <nav>
      <button type="button" @click="logout">Logout</button>
    </nav>

    <main>
      <RouterView />
    </main>
  </div>
</template>
