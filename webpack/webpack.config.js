/**
 * External dependencies.
 */
const path = require("path");

/**
 * Internal dependencies.
 */
const loaders = require("./loaders");
const plugins = require("./plugins");

const isDev = (process.env.NODE_ENV = "development");

let config = {
  entry: {
    main: path.resolve(__dirname, "../src/main.js")
  },

  devtool: isDev ? "inline-source-map" : false,
  mode: process.env.NODE_ENV,
  module: {
    rules: loaders
  },
  plugins,
  output: {
    path: path.resolve(__dirname, "../assets/js"),
    filename: "[name].js"
  },
  optimization: {
    minimize: true
  }
};

// Add dev server only for development mode and not for production.
if (isDev) {
  config.devServer = {
    devMiddleware: {
      writeToDisk: true
    },
    allowedHosts: "all",
    host: "localhost",
    port: 8887,
    proxy: {
      "/assets": {
        pathRewrite: {
          "^/assets": ""
        }
      }
    }
  };
}

module.exports = config;
