<script setup lang="ts">
import Auth from '@/api/Auth'
import RedButton from '@/components/RedButton.vue'
import useAuthStore from '@/stores/auth'
import { storeToRefs } from 'pinia'
import { useRouter } from 'vue-router'

const router = useRouter()
const authStore = useAuthStore()

const { user } = storeToRefs(authStore)

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
    <nav class="bg-white py-4">
      <div class="container mx-auto grid grid-cols-2 justify-between items-center">
        <div class="font-bold text-2xl">Char Analyzer</div>
        <div class="justify-self-end">
          <RedButton type="button" label="Logout" @click="logout" />
        </div>
      </div>
    </nav>

    <main class="mt-8 container mx-auto">
      <div class="font-semibold">Hello, {{ user.name }}</div>
      <RouterView />
    </main>

    <footer class="mt-8 container mx-auto py-4">
      <a href="https://github.com/zlnew/char-analyzer" target="_blank" class="text-slate-600"
        >@aprizqymaulana</a
      >
    </footer>
  </div>
</template>
