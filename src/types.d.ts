type ApiResponse = {
  message: string
}

type User = {
  name: string
  email: string
}

type CharAnalysis = {
  char_one: string
  char_two: string
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
  char_one: string
  char_two: string
}
