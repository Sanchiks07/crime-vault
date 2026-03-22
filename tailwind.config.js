import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                bg: "rgb(var(--bg) / <alpha-value>)",
                surface: "rgb(var(--surface) / <alpha-value>)",
                primary: "rgb(var(--primary) / <alpha-value>)",
                accent: "rgb(var(--accent) / <alpha-value>)",
                text: "rgb(var(--text) / <alpha-value>)",
                victimKilled: "rgb(var(--victimKilled) / <alpha-value>)",
                suspectWounded: "rgb(var(--suspectWounded) / <alpha-value>)",
            }
        },
    },

    plugins: [forms],
};
