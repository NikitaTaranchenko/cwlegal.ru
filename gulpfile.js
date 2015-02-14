var elixir = require('laravel-elixir');
var gulp = require('gulp');

// Configure elixir bowerDir
elixir.config.bowerDir='bower_components';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less')
        .version('css/app.css')
        .scripts(['jquery.min.js']);
});

/*
 |--------------------------------------------------------------------------
 | Gulp Task - exportFromBower
 |--------------------------------------------------------------------------
 |
 | Exports components to 'resources/assets'
 |
 */
gulp.task('exportFromBower', function(){
    gulp.src('bower_components/bootstrap/dist/js/*')
        .pipe(gulp.dest('resources/assets/js'));

    gulp.src('bower_components/bootstrap/less/*')
        .pipe(gulp.dest('resources/assets/less/bootstrap'));

    gulp.src('bower_components/jquery/dist/*')
        .pipe(gulp.dest('resources/assets/js'));

    gulp.src('resources/assets/js/jquery.min.map')
        .pipe(gulp.dest('public/js'));
});
