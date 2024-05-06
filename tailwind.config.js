/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {
            animation: {
                "scale-in-center":
                    "scale-in-center 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940)   both",
                "scale-out-center":
                    "scale-out-center 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530)   both",
            },
            keyframes: {
                "scale-in-center": {
                    "0%": {
                        transform: "scale(0)",
                        opacity: "1",
                    },
                    to: {
                        transform: "scale(1)",
                        opacity: "1",
                    },
                },
                "scale-out-center": {
                    "0%": {
                        transform: "scale(1)",
                        opacity: "1",
                    },
                    to: {
                        transform: "scale(0)",
                        opacity: "1",
                    },
                },
            },
        },
    },
    plugins: [],
};
