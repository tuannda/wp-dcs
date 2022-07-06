const resolver = require('postcss-import-resolver')
const path = require('path')

module.exports = {
    plugins: {
        'postcss-import': {
            resolve: resolver({
                alias: {
                    '~modules': path.resolve(__dirname, 'modules')
                }
            })
        },
        'tailwindcss/nesting': {},
        tailwindcss: {},
        'postcss-simple-vars': {},
        'postcss-preset-env': {
            features: { 'nesting-rules': false }
        },
        autoprefixer: {},
        cssnano: process.env.NODE_ENV === 'production' ? { preset: 'default' } : false
    }
}
