/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php", // Include all Blade files
      "./resources/**/*.js",        // Include JS files (if any)
      "./resources/**/*.vue",       // Include Vue files (if you use Vue, optional)
    ],
    theme: {
      extend: {}, // You can customize colors, fonts, etc., here later
    },
    plugins: [],
  }