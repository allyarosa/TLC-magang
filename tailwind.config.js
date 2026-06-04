/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/flowbite-datepicker/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primarys: "#FBCB04",
                accent: "#F4CC7C",
                darkblue: "#0C548C",
                softblue: "#5F809C",
                lightblue: "#A6BFCF",
                navy: "#2E4D69",
                white: "#FFFFFF",
                black: "#000000",
                abu: "#F6F8FD",
                biru: "#0C548C",
                tombol: "#34364A",
                kuning: "#FBCB04",
                greys: "#E8EBF3",
                birutua: "#2E4D69",
                inputHint: "#ACB3BF",
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                },
                brandBlue: {
                    DEFAULT: "#1D4E89",
                    dark: "#0d2a4e",
                },
                brandGreen: {
                    DEFAULT: "#2A9D8F",
                    dark: "#1a6e63",
                },
                brandOrange: {
                    DEFAULT: "#E76F51",
                    dark: "#cf4a2a",
                },
            },
            fontFamily: {
                sans: ["Segoe UI", "ui-sans-serif", "system-ui", "sans-serif"],
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                blob: {
                    '0%': { transform: 'translate(0px, 0px) scale(1)' },
                    '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                    '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                    '100%': { transform: 'translate(0px, 0px) scale(1)' },
                }
            },
            animation: {
                float: 'float 6s ease-in-out infinite',
                blob: 'blob 7s infinite',
            }
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("flowbite/plugin")
    ],
    darkMode: "class",
};