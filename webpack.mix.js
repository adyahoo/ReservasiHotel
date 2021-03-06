const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .react()
    .extract(['react'])
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.sass('resources/scss/client/layout.scss', 'public/css/client')
    .sass('resources/scss/client/reservasi.scss', 'public/css/client')
    .sass('resources/scss/client/assessment.scss', 'public/css/client')
    .sass('resources/scss/client/success_reservasi.scss', 'public/css/client')
    .sourceMaps(true, 'source-map');

mix.version();