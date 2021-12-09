const mix = require('laravel-mix');
const path = require('path');

mix.setPublicPath(path.normalize('public/assets/bwai'))
    .js('resources/assets/bwai/app.js', 'js/app.js')
    .vue()
    .postCss('resources/assets/bwai/app.css', 'css/app.css', [
        require('postcss-import'),
        require('tailwindcss')({ config: './tailwind.bwai.config.js' }),
        require('autoprefixer'),
    ])
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/assets/bwai'),
            },
        },
    })
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}