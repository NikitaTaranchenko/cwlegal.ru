var elixir = require('laravel-elixir');
elixir.config.bowerDir='bower_components';
console.log(elixir);
var gulp = require('gulp');
console.log(gulp);
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
    mix.less('app.less');
});

gulp.task('exportFromBower', function(){
    gulp.src('bower_components/bootstrap/dist/js/*')
        .pipe(gulp.dest('resources/assets/js'));

    gulp.src('bower_components/bootstrap/less/*')
        .pipe(gulp.dest('resources/assets/less'));

    gulp.src('bower_components/jquery/dist/*')
        .pipe(gulp.dest('resources/assets/js'));
});
