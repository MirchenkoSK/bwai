const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Ubuntu', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '120': '30rem',
            },
            minWidth: {
                '80': '20rem',
                '120': '30rem',
            }
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.coolGray,
            red: colors.red,
            yellow: colors.amber, 
            blue: colors.blue,
            teal: colors.teal,
            orange: colors.orange,
            pink: colors.pink,
            green: colors.green,
            primary: '#ff5252',
            secondary: '#0088cc',
            groovbox: {
                red: {
                    light: '#fb4934',
                    DEFAULT: '#cc241d',
                    dark: '#9d0006',
                },
                green: {
                    light: '#b8bb26',
                    DEFAULT: '#98971a',
                    dark: '#79740e',
                },
                blue: {
                    light: '#83a598',
                    DEFAULT: '#458588',
                    dark: '#076678',
                },
                light: {
                    50: '#f9f5d7',
                    100: '#fbf1c7',
                    150: '#f2e5bc',
                    200: '#ebdbb2',
                    300: '#d5c4a1',
                    400: '#bdae93',
                    500: '#a89984',
                    'DEFAULT': '#928374',
                    600: '#7c6f64',
                    700: '#665c54',
                    800: '#504945',
                    900: '#3c3836',
                    999: '#282828',
                },
                dark: {
                    50: '#1d2021',
                    100: '#282828',
                    150: '#32302f',
                    200: '#3c3836',
                    300: '#504945',
                    400: '#665c54',
                    500: '#7c6f64',
                    'DEFAULT': '#928374',
                    600: '#a89984',
                    700: '#bdae93',
                    800: '#d5c4a1',
                    900: '#ebdbb2',
                    999: '#fbf1c7',
                },
            }
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
