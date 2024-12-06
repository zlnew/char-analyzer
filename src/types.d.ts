type ApiResponse = {
  message: string
}

type User = {
  name: string
  email: string
}

type CharAnalysis = {
  id: number
  input_one: string
  input_two: string
  percentage: number
}

type LoginCredential = {
  email: string
  password: string
}

type RegistrationForm = {
  name: string
  email: string
  password: string
  password_confirmation: string
}

type CharMatchRequest = {
  input_one: string
  input_two: string
}
