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
                cyber: {
                    bg: '#0a0f1c', // Deep dark blue/black
                    panel: 'rgba(255, 255, 255, 0.03)',
                    border: 'rgba(255, 255, 255, 0.1)',
                    accent: '#38bdf8', // Sky 400
                    hover: '#7dd3fc', // Sky 300
                }
            },
            boxShadow: {
                'glow': '0 0 15px rgba(56, 189, 248, 0.5)',
                'glow-lg': '0 0 30px rgba(56, 189, 248, 0.6)',
                'glow-red': '0 0 15px rgba(244, 63, 94, 0.5)',
                'panel': '0 8px 32px 0 rgba(0, 0, 0, 0.5)',
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.6s ease-out forwards',
                'float': 'float 6s ease-in-out infinite',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                }
            }
        },
    },

    plugins: [forms],
};
