const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ...defaultTheme.colors,
                primary: {
                    50: "#f6fbfd",
                    100: "#e6f8fd",
                    200: "#c0e9fb",
                    300: "#95d4fb",
                    400: "#5aaafa",
                    500: "#007bff",
                    600: "#1b59f2",
                    700: "#1946da",
                    800: "#1635a6",
                    900: "#122b7e",
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
