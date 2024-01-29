const defaultTheme = require("tailwindcss/defaultTheme");
/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Nunito Sans"', ...defaultTheme.fontFamily.sans]
      }
    }
  },
  plugins: [
    require("@tailwindcss/forms")
  ]
};
