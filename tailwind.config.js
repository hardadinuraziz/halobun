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
                // Halodoc Signature Brand Palette
                halodoc: {
                    50: '#FFF0F5',
                    100: '#FFE0EB',
                    200: '#FFC2D6',
                    300: '#FFA3C2',
                    400: '#FF6B9B',
                    500: '#E0004D', // Official Halodoc Primary Red
                    600: '#C70044',
                    700: '#A30038',
                    800: '#7F002C',
                    900: '#5C0020',
                    DEFAULT: '#E0004D',
                },
                brand: {
                    red: '#E0004D',
                    redHover: '#C70044',
                    redLight: '#FFF0F5',
                    redBorder: '#FFD1DF',
                    dark: '#1E293B',
                    muted: '#64748B',
                },
            },
        },
    },

    plugins: [forms],
};
