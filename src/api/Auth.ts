import api from '@/api'
import Api from './Api'
import { AxiosError } from 'axios'

class Auth extends Api {
  public async user<T>() {
    try {
      const response = await api.get('api/user')

      return <T>response.data
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }

  public async login(request: LoginCredential) {
    try {
      await api.post('login', request)
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }

  public async register(request: RegistrationForm) {
    try {
      await api.post('register', request)
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }

  public async logout() {
    try {
      await api.post('logout')
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }
}

export default new Auth()
