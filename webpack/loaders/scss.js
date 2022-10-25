const miniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  test: /\.s[ac]ss$/i,
  use: [
    miniCssExtractPlugin.loader,
    "css-loader",
    "sass-loader",
  ]
};
