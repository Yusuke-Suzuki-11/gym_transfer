const path = require('path');

module.exports = {
    devtool: "eval-source-map",
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};
