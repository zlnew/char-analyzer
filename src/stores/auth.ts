import { useLocalStorage } from '@vueuse/core'
import { defineStore } from 'pinia'
import { computed } from 'vue'

const useAuthStore = defineStore('auth', () => {
  const user = useLocalStorage<User>('ca_user', {} as User)

  const isAuthenticated = computed(() => !!user.value.email)

  return {
    user,
    isAuthenticated,
  }
})

export default useAuthStore
