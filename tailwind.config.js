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
	theme: {
		extend: {
      fontSize: {
        '45px': '45px',
        '30px': '30px',
        '26px': '26px',
        '22px': '22px',
        '18px': '18px',
        '14px': '14px',
      },
			colors: {
        'blue': '#4569E0'
			},
      width: {
        '110': '110%',
        '120': '120%',
        '130': '130%',
        '140': '140%',
        '150': '150%',
        '160': '160%',
        '170': '170%',
        '180': '180%',
        '190': '190%',
        '200': '200%',
      }
		}
	},
  variants: {
    extend: {
      padding: ['last', 'first']
    }
  },
}
