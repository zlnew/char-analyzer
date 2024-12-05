import defaultTheme from 'tailwindcss/defaultTheme'
import twForms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/views/app.blade.php', './src/**/*.{html,vue,js,ts}'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [twForms],
}
