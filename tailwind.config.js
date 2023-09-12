import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    screens: {
        sm: '576px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
    },

    theme: {
        extend: {
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        blockquote: {
                            fontWeight: 'normal',
                            color: theme('colors.slate.600'),
                        },
                        'blockquote p:first-of-type::before': {
                            content: '',
                        },
                        'blockquote p:last-of-type::after': {
                            content: '',
                        },
                    },
                },
            }),
        },
    },

    plugins: [forms, typography],
};
