import api from '@/api'
import Api from './Api'
import { AxiosError } from 'axios'

class CharAnalysis extends Api {
  protected resource = 'api/char-analyses'

  public async get<T>() {
    try {
      const response = await api.get(this.resource)

      return <T>response.data
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }

  public async destroy<T>(resourceId: number) {
    try {
      const response = await api.delete(`${this.resource}/${resourceId}`)

      return <T>response.data
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }
}

export default new CharAnalysis()
