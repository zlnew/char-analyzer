import axios from 'axios'
import useAuthStore from './stores/auth'

const api = axios.create({
  baseURL: import.meta.env.VITE_APP_URL,
  timeout: 1000,
  headers: {
    Accept: 'application/json',
  },
  withCredentials: true,
  withXSRFToken: true,
  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',
})

api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response && error.response.status === 401) {
      const authStore = useAuthStore()

      authStore.user = {} as User
      window.location.href = '/auth/login'
    }

    return Promise.reject(error)
  },
)

export default api
