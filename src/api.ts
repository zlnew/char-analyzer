import axios from 'axios'

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

export default api
