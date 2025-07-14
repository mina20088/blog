/** @type {import('tailwindcss').Config} */
export default {
    corePlugins: {
        preflight: true,
    },
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontSize: {
                'xs': '16px'
            },
            screens: {
                'xs' : "320px",
                'sm' : "576px",
                'md' : "768px",
                'lg' : "992px",
                'xl' : "1200px",
                'xxl' : "1400px",
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

