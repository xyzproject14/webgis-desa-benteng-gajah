import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        // "./resources/**/*.js",
        // "./resources/views/**/*.blade.php",
        // "./resources/js/**/*.vue",
        "./src/**/*.{html,js}",

        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        // './public/*.html'
    ],
    // presets: [require("@acmecorp/base-tailwind-config")],
    prfix: "my",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
        backgroundColor: {
            biru: "#1fb6ff",
            ijauu: "#13ce66",
            oren: "#f28123",
        },
        colors: {
            biru: "#1fb6ff",
            ijauu: "#13ce66",
            oren: "#f28123",
        },
    },

    plugins: [
        forms,
        typography,
        require("tailwindcss"),
        require("autoprefixer"),
        require("daisyui"),
        require("tailwind-scrollbar-hide"),
    ],
    variants: {
        backgroundColor: ["responsive", "hover", "focus"],
    },
};
