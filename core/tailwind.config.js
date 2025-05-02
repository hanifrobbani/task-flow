import defaultTheme from 'tailwindcss/defaultTheme';
import daisyui from "daisyui"

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        screens: {
            '2k': '2561px',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                "family-thin": ["Inter", "serif"]
            },
        },
    },
    plugins: [
        daisyui,
    ],
};
