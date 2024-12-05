import defaultTheme from 'tailwindcss/defaultTheme'
import twForms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/views/app.blade.php', './src/**/*.{html,vue,js,ts}'],
  theme: {
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [twForms],
}
