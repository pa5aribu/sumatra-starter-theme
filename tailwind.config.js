const colors = require('tailwindcss/colors')

module.exports = {
  corePlugins: {
    container: false
  },
  content: ["./**/*.php"],
	theme: {
		extend: {
      colors: {
        'primary': '#3867d6',
        'secondary': '#4b7bec',
      },
      fontFamily: {
        'display': ['Noto Serif', 'serif'],
        'body': ['Open Sans', 'sans-serif']
      }
		}
	},
  plugins: [
    require('@tailwindcss/typography')
  ]
}
