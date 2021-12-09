const mix = require('laravel-mix');
const path = require('path');

mix.setPublicPath(path.normalize('public/assets/website'))
    .js('resources/assets/website/app.js', 'js/app.js')
    .vue()
    .postCss('resources/assets/website/app.css', 'css/app.css', [
        require('postcss-import'),
        require('tailwindcss')({ config: './tailwind.website.config.js' }),
        require('autoprefixer'),
    ])
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/assets/website'),
            },
        },
    })
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}