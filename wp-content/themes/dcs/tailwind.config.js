const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './src/**/*.js',
        './module/**/*.{js,php,html}',
        './partials/**/*.{js,php,html}',
        './templates/**/*.{js,php,html}',
        './**/*.{php,html}'
    ],
    darkMode: 'class',
    theme: {
        screens: {},
        aspectRatio: {},
        extend: {}
    },
    variants: {},
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio')
    ]
}
