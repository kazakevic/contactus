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
mix.disableNotifications();

mix.js('src/resources/assets/js/contactUs.js', 'src/public/js')
.sass('src/resources/assets/sass/contactUs.scss', 'src/public/css');

mix.copy('src/public/js/contactUs.js', '../../../public/js');
mix.copy('src/public/css/contactUs.css', '../../../public/css');

