const path = require('path');

module.exports = {
  mode: 'development', // change to production for smaller bundle
  entry: {
    main: './src/js/index.js'
  },
  output: {
    path: path.resolve(__dirname, "dist/js"),
    filename: '[name].bundle.js', // Hacky way to force webpack to have multiple output folders vs multiple files per one path
  },
  watch: true,
  optimization: {
    minimize: true
  }
}
