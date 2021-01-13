const mix = require('laravel-mix');
mix
    .setPublicPath('./publishable/assets')
    .js('resources/assets/js/admin.js', 'js')
    .extract()
    .sass('resources/assets/sass/admin.scss', 'css')
    .version();
