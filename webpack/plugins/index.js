/**
 * External dependencies.
 */
const miniCssExtractPlugin = require('mini-css-extract-plugin');
const { VueLoaderPlugin } = require('vue-loader');

const plugins = [
  new miniCssExtractPlugin({
    filename: '../css/main.css',
  }),
  new VueLoaderPlugin(),
];

if (process.env.NODE_ENV === 'development') {
  plugins.push(require('./browser-sync'));
}

module.exports = plugins;
