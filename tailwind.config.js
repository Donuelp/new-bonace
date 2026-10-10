/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/customer/**/*.blade.php',
        './resources/js/customer.js',
        './resources/js/components/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                bonace: {
                    ink: '#24211d',
                    sand: '#f4f0e9',
                    gold: '#a97f3d',
                },
            },
        },
    },
    plugins: [],
};
