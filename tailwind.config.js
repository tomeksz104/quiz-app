const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/layout/frontend/*.blade.php",

        // WireUi
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins", "sans-serif"],
            },
        },
    },

    safelist: [
        // Modals
        'sm:max-w-md',
        'md:max-w-xl',
        'lg:max-w-3xl',
        'xl:max-w-5xl',
        '2xl:max-w-8xl',

        //Categories
        'text-[#ef4444]',
        'bg-[#ef4444]',
        'bg-[#ef4444]/10',
        'hover:bg-[#ef4444]',

        'text-[#22c55e]',
        'bg-[#22c55e]',
        'bg-[#22c55e]/10',
        'hover:bg-[#22c55e]',

        'text-[#f59e0b]',
        'bg-[#f59e0b]',
        'bg-[#f59e0b]/10',
        'hover:bg-[#f59e0b]',

        'text-[#f97316]',
        'bg-[#f97316]',
        'bg-[#f97316]/10',
        'hover:bg-[#f97316]',

        'text-[#10b981]',
        'bg-[#10b981]',
        'bg-[#10b981]/10',
        'hover:bg-[#10b981]',

        'text-[#14b8a6]',
        'bg-[#14b8a6]',
        'bg-[#14b8a6]/10',
        'hover:bg-[#14b8a6]',

        'text-[#3b82f6]',
        'bg-[#3b82f6]',
        'bg-[#3b82f6]/10',
        'hover:bg-[#3b82f6]',

        'text-[#0ea5e9]',
        'bg-[#0ea5e9]',
        'bg-[#0ea5e9]/10',
        'hover:bg-[#0ea5e9]',

        'text-[#6366f1]',
        'bg-[#6366f1]',
        'bg-[#6366f1]/10',
        'hover:bg-[#6366f1]',

        'text-[#eab308]',
        'bg-[#eab308]',
        'bg-[#eab308]/10',
        'hover:bg-[#eab308]',

        'text-[#8b5cf6]',
        'bg-[#8b5cf6]',
        'bg-[#8b5cf6]/10',
        'hover:bg-[#8b5cf6]',

        'text-[#84cc16]',
        'bg-[#84cc16]',
        'bg-[#84cc16]/10',
        'hover:bg-[#84cc16]',

        'text-[#a855f7]',
        'bg-[#a855f7]',
        'bg-[#a855f7]/10',
        'hover:bg-[#a855f7]',

        'text-[#d946ef]',
        'bg-[#d946ef]',
        'bg-[#d946ef]/10',
        'hover:bg-[#d946ef]',

        'text-[#06b6d4]',
        'bg-[#06b6d4]',
        'bg-[#06b6d4]/10',
        'hover:bg-[#06b6d4]',

        'text-[#10b981]',
        'bg-[#10b981]',
        'bg-[#10b981]/10',
        'hover:bg-[#10b981]',


        // Quiz Types
        // Quiz wiedzy
        'text-[#10b981]',
        'bg-[#10b981]/10',
        'hover:bg-[#10b981]',

        'from-[#10b981]/20',
        'to-[#10b981]/40',
        'bg-[#10b981]',
        'hover:text-[#10b981]',

        // Quiz na czas
        'text-[#187de4]',
        'bg-[#187de4]/10',
        'hover:bg-[#187de4]',

        'from-[#187de4]/20',
        'to-[#187de4]/40',
        'bg-[#187de4]',
        'hover:text-[#187de4]',

        // Zagadka
        'text-[#7337ee]',
        'bg-[#7337ee]/10',
        'hover:bg-[#7337ee]',

        'from-[#7337ee]/20',
        'to-[#7337ee]/40',
        'bg-[#7337ee]',
        'hover:text-[#7337ee]',

        // Psychotest
        'text-[#f97316]',
        'bg-[#f97316]/10',
        'hover:bg-[#f97316]',

        'from-[#f97316]/20',
        'to-[#f97316]/40',
        'bg-[#f97316]',
        'hover:text-[#f97316]',

        // Co wolisz?
        'text-[#ef4444]',
        'bg-[#ef4444]/10',
        'hover:bg-[#ef4444]',

        'from-[#ef4444]/20',
        'to-[#ef4444]/40',
        'bg-[#ef4444]',
        'hover:text-[#ef4444]',

      ],

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/line-clamp"),
    ],
};
