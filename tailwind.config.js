import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

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
      base: ["1rem", { lineHeight: "1.5rem" }],
      lg: ["1.125rem", { lineHeight: "1.75rem" }],
      xl: ["1.25rem", { lineHeight: "1.75rem" }],
      "2xl": ["1.5rem", { lineHeight: "2rem" }],
      "3xl": ["1.875rem", { lineHeight: "2.25rem" }],
      "4xl": ["2.25rem", { lineHeight: "2.5rem" }],
      "5xl": ["3rem", { lineHeight: "1" }],
      "6xl": ["3.75rem", { lineHeight: "1" }],
      "7xl": ["4.5rem", { lineHeight: "1" }],
      "8xl": ["6rem", { lineHeight: "1" }],
      "9xl": ["8rem", { lineHeight: "1" }],
    },
    extend: {
      fontFamily: {
        sans: ["Segoe UI", ...defaultTheme.fontFamily.sans],
        // sans: ["Outfit", ...defaultTheme.fontFamily.sans],
        grotesk: ["Space Grotesk", ...defaultTheme.fontFamily.sans],
        epilogue: ["Epilogue", ...defaultTheme.fontFamily.sans],
        mono: ["Cascadia Mono", ...defaultTheme.fontFamily.mono],
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            "code::before": {
              content: "none",
            },
            "code::after": {
              content: "none",
            },
            code: {
              color: "#232629",
              backgroundColor: "#e3e6e8",
              fontWeight: "400",
              borderRadius: "4px",
              paddingLeft: "4px",
              paddingRight: "4px",
              paddingTop: "2px",
              paddingBottom: "2px",
            },
          },
        },
      }),
    },
  },

  plugins: [forms, typography],
};
