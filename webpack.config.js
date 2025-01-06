// webpack.config.js
const path = require('path');
const  webpack  = require('webpack');
// console.log(/* path, */__dirname);

module.exports = {
    entry: './index.js', // Entry file
    output: {
        filename: 'main.js', // Output bundle
        path: path.resolve(__dirname, 'assets/js'), // Output directory
    },
    mode: 'production', // Set to 'development' or 'production'
    plugins: [
        new webpack.IgnorePlugin({
            resourceRegExp: /^\.\/locale$/,
            contextRegExp: /moment$/,
        }),
    ],
    module: {
        rules: [
            {
                test: /\.css$/, // Handle CSS files
                use: ['style-loader', 'css-loader'],
            },
        ],
    },
};