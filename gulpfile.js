const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
elixir(function(mix)
{
   mix.less('resources/assets/less/build_standalone.less','resources/assets/css/build_standalone.css')
});

elixir(function(mix) {
    mix.sass('app.scss','resources/assets/css/app.css')
        .browserify('app.js')

});

elixir(function(mix)
{
   mix.styles([
        'resources/assets/css/app.css',
        'resources/assets/css/build_standalone.css',
       'resources/assets/css/select2.min.css',
       'resources/assets/css/fullcalendar.min.css'
   ]);
});

