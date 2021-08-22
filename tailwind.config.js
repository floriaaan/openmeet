const colors = require("tailwindcss/colors");

module.exports = {
  mode: "jit",
  purge: ["./pages/**/*.{js,ts,jsx,tsx}", "./components/**/*.{js,ts,jsx,tsx}"],
  darkMode: "class",
  plugins: [
    require("@tailwindcss/forms")({
      strategy: "class",
    }),
  ],
  theme: {
    extend: {},
    colors: {
      ...colors,
    },
  },
};
