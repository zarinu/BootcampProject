const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix
    //
    // ─── STYLESHEETS ─────────────────────────────────────────────────
    //

    .styles(
        [
            'resources/css/app.css',
            'resources/css/main.css'
        ],
        'public/css/app.css',
    )

    //
    // ─── JAVASCRIPTS ─────────────────────────────────────────────────
    //

    .scripts(
        [
            'resources/js/app.js',
        ],
        'public/js/app.css'
    )

    //
    // ─── STATIC FILES ────────────────────────────────────────────────
    //

    // .copy(
    //     [
    //         'resources/assets/images/favicon.ico',
    //     ],
    //     'public/images/',
    // )

    //
    // ─── WEBPACK MIX OTHER CONFIGURATIONS ────────────────────────────
    //
    // .sass('resources/sass/app.scss', 'public/css')

    .version();