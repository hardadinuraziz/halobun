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
                sans: ['Plus Jakarta Sans', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Sage & Matcha Pastel Garden
                emerald: {
                    50: '#F4F7F3',
                    100: '#E5EDE3',
                    200: '#CDDCAB',
                    250: '#CADBCA',
                    300: '#B0C8AF',
                    400: '#8EAF8D',
                    500: '#6E976D',
                    600: '#567D55',
                    700: '#436342',
                    800: '#334D32',
                    900: '#243723',
                },
                // Warm Terracotta / Tanah & Pot Kebun
                amber: {
                    50: '#FDF9F5',
                    100: '#FAF0E8',
                    200: '#F4DFD2',
                    300: '#E9C4AF',
                    400: '#D99F80',
                    500: '#C5805C',
                    600: '#AA6743',
                    700: '#894E30',
                    800: '#6C3D26',
                    900: '#4E2B1A',
                },
                // Sprout & Mint Herbal
                lime: {
                    50: '#F8FAF3',
                    100: '#EDF5E0',
                    200: '#DCEBCA',
                    300: '#C4DEAA',
                    400: '#A4CD84',
                    500: '#84B462',
                    600: '#69954A',
                    700: '#517439',
                    800: '#3D572B',
                    900: '#2A3C1D',
                },
                // Bunga Kebun / Lavender Sky
                blue: {
                    50: '#F6F8FB',
                    100: '#EAF0F6',
                    200: '#D7E2EE',
                    300: '#BACBE0',
                    400: '#97AFCE',
                    500: '#7592B8',
                    600: '#5B769B',
                    700: '#455C7B',
                    800: '#33455D',
                    900: '#222F40',
                },
                // Soft Warm Gray (Organic Paper & Stone)
                gray: {
                    50: '#F9FAF7',
                    100: '#F1F4EE',
                    200: '#E4E8E0',
                    300: '#CFD6CA',
                    400: '#9EAA98',
                    500: '#717E6B',
                    600: '#546050',
                    700: '#3E473B',
                    800: '#2C3329',
                    900: '#1B2119',
                },
            },
        },
    },

    plugins: [forms],
};
