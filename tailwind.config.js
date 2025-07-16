/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
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
                inputan: "#E5E9F2",
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
            },
            fontFamily: {
                sans: ["Segoe UI", "ui-sans-serif", "system-ui", "sans-serif"],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("flowbite/plugin")
    ],
    darkMode: "class",
};