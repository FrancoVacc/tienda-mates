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
        },
        colors: {
            'corduraGreen': '#5A5A3A',
            'corduraLightGreen': '#9C9C6B',
            'white': '#ffffff',
            'black': '#1F1F1F',
            'zinc': '#d4d4d8',
            'green': '#22c55e',
            'lightGreen': '#86efac',
            'blue': '#1A56DB',
            'lightBlue': '#3F83F8',
            'red': '#C81E1E ',
            'lightRed': '#F05252',
            'yellow': '#E3A008',
            'lightYellow': '#FCE96A',
            'purple': '#6C2BD9',
            'lightPurple': '#9061F9',
            'gray': '#6b7280'
        }
    },

    plugins: [forms],
};
