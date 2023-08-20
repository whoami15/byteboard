import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],

  theme: {
    fontSize: {
      xs: ["0.8125rem", "1.25rem"],
      sm: ["0.875rem", "1.25rem"],
      base: "1rem",
      xl: "1.25rem",
      "2xl": "1.563rem",
      "3xl": "1.953rem",
      "4xl": "2.441rem",
      "5xl": "3.052rem",
    },
    extend: {
      fontFamily: {
        sans: ["Segoe UI", ...defaultTheme.fontFamily.sans],
        // sans: ["Outfit", ...defaultTheme.fontFamily.sans],
        grotesk: ["Space Grotesk", ...defaultTheme.fontFamily.sans],
        epilogue: ["Epilogue", ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [forms],
};
