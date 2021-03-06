const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
require('laralix-imagemin');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix
            .copy('resources/assets/css', 'public/css')
            //.copy('resources/assets/images', 'public/images')
            .imagemin('resources/assets/images', 'public/images')
            .copy('resources/assets/fonts', 'public/fonts')
            .copy('resources/assets/switcher', 'public/switcher')
            .copy('resources/assets/js/', 'public/js/')
            .sass('app.scss')
            .webpack('app.js')
            ;
});
