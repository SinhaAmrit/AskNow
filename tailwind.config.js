const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    important: true,
    // Active dark mode on class basis
    darkMode: 'class',
    i18n: {
        locales: ["en-US"],
        defaultLocale: "en-US",
    },
    purge: [
    './pages/**/*.tsx',
    './components/**/*.tsx',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            backgroundImage: (theme) => ({
                check: "url('/icons/check.svg')",
                landscape: "url('/images/landscape/2.jpg')",
            }),
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ["checked"],
            borderColor: ["checked"],
            inset: ["checked"],
            zIndex: ["hover", "active"]
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
    future: {
        purgeLayersByDefault: true,
    },
};
