const miniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    test: /\.css$/,
    use: [
        miniCssExtractPlugin.loader,
        "style-loader",
        "css-loader",
    ]
};
