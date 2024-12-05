export default abstract class Api {
  protected resource: string = ''

  protected handleErrorResponse(data: ApiResponse) {
    throw new Error(data.message)
  }
}
