module.exports = {

    darkMode: 'class',
    
    purge: [
        './resources/views/website.blade.php',
        './resources/assets/website/**/*.vue',
    ],

    theme: {

        colors: {
            transparent: 'transparent',
            black: '#000000',
            white: '#ffffff',
            red: {
                light: '#EE877E',
                DEFAULT: '#EA4335',
                dark: '#B8362A',
            },
            green: {
                light: '#6FB782',
                DEFAULT: '#34a853',
                dark: '#24753A',
            },
            yellow: {
                light: '#FBD050',
                DEFAULT: '#fbbc04',
                dark: '#C79604',
            },
            blue: {
                light: '#8DB5F7',
                DEFAULT: '#4285f4',
                dark: '#346BC2',
            },
            purple: {
                light: '#C58DF7',
                DEFAULT: '#a142f4',
                dark: '#8034C2',
            },
            aqua: {
                light: '#6AD1E6',
                DEFAULT: '#24c1e0',
                dark: '#1C95AD',
            },
            orange: {
                light: '#F79768',
                DEFAULT: '#f6661e',
                dark: '#C25017',
            },
            gray: {
                light: '#aaaaaa',
                DEFAULT: '#999999',
                dark: '#888888',
            },
            light: {
                'DEFAULT': '#f9f9f9',
                100: '#eeeeee',
                200: '#dddddd',
                300: '#cccccc',
                400: '#bbbbbb',
                500: '#aaaaaa',
                600: '#777777',
                700: '#555555',
                800: '#444444',
                900: '#222222',
            },
            dark: {
                'DEFAULT': '#111111',
                100: '#222222',
                200: '#444444',
                300: '#555555',
                400: '#777777',
                500: '#aaaaaa',
                600: '#bbbbbb',
                700: '#cccccc',
                800: '#dddddd',
                900: '#eeeeee',
            },
        },

        fontFamily: {
            sans: ['Roboto', 'sans-serif'],
            serif: ['Roboto Slab', 'serif'],
        },

        extend: {
            //
        }

    },

    plugins: [
        require('@tailwindcss/forms')
    ]

};
