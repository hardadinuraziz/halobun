import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        'bg-emerald-100', 'bg-blue-100', 'bg-amber-100', 'bg-lime-100',
        'text-emerald-700', 'text-blue-700', 'text-amber-700', 'text-lime-700',
        'text-emerald-800', 'text-blue-800', 'text-amber-800', 'text-lime-800',
        'border-emerald-200', 'border-blue-200', 'border-amber-200', 'border-lime-200',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // JuruTani Signature Brand Palette (https://jurutani.com)
                jurutani: {
                    50: '#F0FDF4',
                    100: '#DCFCE7',
                    200: '#BBF7D0',
                    300: '#86EFAC',
                    400: '#4ADE80',
                    500: '#22C55E',
                    600: '#16A34A', // Official JuruTani Primary Green
                    700: '#15803D',
                    800: '#166534',
                    900: '#14532D',
                    950: '#052E16',
                    DEFAULT: '#16A34A',
                },
                brand: {
                    primary: '#16A34A',
                    primaryHover: '#15803D',
                    primaryLight: '#F0FDF4',
                    primaryBorder: '#BBF7D0',
                    accent: '#4ADE80',
                    dark: '#052E16',
                    text: '#1E293B',
                    muted: '#64748B',
                },
            },
        },
    },

    plugins: [forms],
};
