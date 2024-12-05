import api from '@/api'
import Api from './Api'
import { AxiosError } from 'axios'

class CharMatch extends Api {
  public async compare<T>(request: CharMatchRequest) {
    try {
      const response = await api.post('api/char-match', request)

      return <T>response.data
    } catch (error) {
      if (error instanceof AxiosError) {
        this.handleErrorResponse(error.response?.data)
      }
    }
  }
}

export default new CharMatch()
