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
        .scripts(['jquery.min.js', 'bootstrap.min.js'], 'public/js/framework.js', 'resources/assets/js')
        .scripts(['html5shiv.min.js', 'respond.min.js'], 'public/js/ie.js', 'resources/assets/js')
        .copy('public/fonts', 'public/build/fonts');
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

    gulp.src('bower_components/fontawesome/less/*')
        .pipe(gulp.dest('resources/assets/less/fontawesome'));

    gulp.src('bower_components/fontawesome/fonts/*')
        .pipe(gulp.dest('public/fonts'));

    gulp.src('bower_components/bootstrap/less/mixins/*')
        .pipe(gulp.dest('resources/assets/less/bootstrap/mixins'));

    gulp.src('bower_components/jquery/dist/*')
        .pipe(gulp.dest('resources/assets/js'));

    gulp.src('resources/assets/js/jquery.min.map')
        .pipe(gulp.dest('public/js'));

    gulp.src('bower_components/html5shiv/html5shiv.min.js')
        .pipe(gulp.dest('resources/js'));

    gulp.src('bower_components/respond-minmax/dest/respond.min.js')
        .pipe(gulp.dest('resources/js'));
});
