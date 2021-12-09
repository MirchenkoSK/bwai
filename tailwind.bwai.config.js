module.exports = {

    darkMode: 'class',
    
    purge: [
        './resources/views/bwai.blade.php',
        './resources/assets/bwai/**/*.vue',
    ],

    theme: {
        
        colors: {
            transparent: 'transparent',
            black: '#1d2021',
            white: '#f9f5d7',
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
            yellow: {
                light: '#fabd2f',
                DEFAULT: '#d79921',
                dark: '#b57614',
            },
            blue: {
                light: '#83a598',
                DEFAULT: '#458588',
                dark: '#076678',
            },
            purple: {
                light: '#d3869b',
                DEFAULT: '#b16286',
                dark: '#8f3f71',
            },
            aqua: {
                light: '#8ec07c',
                DEFAULT: '#689d6a',
                dark: '#427b58',
            },
            orange: {
                light: '#fe8019',
                DEFAULT: '#d65d0e',
                dark: '#af3a03',
            },
            gray: {
                light: '#a89984',
                DEFAULT: '#928374',
                dark: '#7c6f64',
            },
            light: {
                'DEFAULT': '#fbf1c7',
                100: '#f2e5bc',
                200: '#ebdbb2',
                300: '#d5c4a1',
                400: '#bdae93',
                500: '#a89984',
                600: '#7c6f64',
                700: '#665c54',
                800: '#504945',
                900: '#3c3836',
            },
            dark: {
                'DEFAULT': '#282828',
                100: '#32302f',
                200: '#3c3836',
                300: '#504945',
                400: '#665c54',
                500: '#7c6f64',
                600: '#a89984',
                700: '#bdae93',
                800: '#d5c4a1',
                900: '#ebdbb2',
            },
        },

        fontFamily: {
            sans: ['Ubuntu', 'sans-serif'],
            serif: ['Ubuntu Mono', 'serif'],
            monospace: ['Ubuntu Mono', 'monospace'],
        },
        
        extend: {
            spacing: {
                '120': '30rem',
            },
            minWidth: {
                '80': '20rem',
                '120': '30rem',
            },
            maxHeight: {
                'case': 'calc(100vh - 72px)',
                'content': 'calc(100vh - 126px)',
            }
        },
        
    },

    plugins: [
        require('@tailwindcss/forms')
    ]
}
