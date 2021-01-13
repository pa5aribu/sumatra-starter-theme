module.exports = {
	// purge: {
	// 	enabled: true,
	// 	content: [
	// 		'./*.php',
	// 		'./**/*.php'
	// 	]
  // },
  corePlugins: {
    container: false
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        '.container': {
					marginLeft: 'auto',
					marginRight: 'auto',
          maxWidth: '100%',
          '@screen sm': {
            maxWidth: '640px',
          },
          '@screen md': {
            maxWidth: '768px',
          },
          '@screen lg': {
            maxWidth: '1024px',
          },
          '@screen xl': {
            maxWidth: '1200px',
          },
        }
      })
    }
	],
	theme: {
		extend: {
			colors: {
				'example': '#4256A2',
			}
		}
	}
}
