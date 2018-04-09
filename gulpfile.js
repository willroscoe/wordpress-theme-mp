'use strict';

var gulp    = require('gulp'),
    cssnano = require('gulp-cssnano'),
    sass    = require('gulp-sass'),
    del     = require('del'),
    concat  = require('gulp-concat'),
    uglify = require('gulp-uglify');
    //syncy        = require('syncy');


var supported = [
    'last 2 versions',
    'safari >= 8',
    'ie >= 10',
    'ff >= 20',
    'ios 6',
    'android 4'
];

gulp.task('css', function(){
    return gulp.src(['src/sass/**/*.scss'])
        .pipe(sass())
        .pipe(cssnano({
            autoprefixer: {browsers: supported, add: true}
        }))
        .pipe(gulp.dest('./src/'));
});

gulp.task('scripts', function() {
    gulp.src(['src/js/libs/jquery.cookie.js', 'src/js/libs/colorbox.js', 'src/js/libs/main.js'])
      .pipe(concat('mattering.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest('./src/js/'))
  });

gulp.task('watch', function(){
    gulp.watch('src/sass/**/*.scss', ['css', 'copycss']);
    // Other watchers
});

// copy all files to the local wordpress test site
gulp.task('copycss', function () {
    gulp.src('./src/style.css')
        .pipe(gulp.dest('../../../Sites/wordpress/wp-content/themes/matteringpress/'));
});

gulp.task('deletecss', function () {
    return del([
        '../../../Sites/wordpress/wp-content/themes/matteringpress/style.css'], {force:true}
    );
});

gulp.task('copyall', function () {
    gulp.src('./src/**/*')
        .pipe(gulp.dest('../../../Sites/wordpress/wp-content/themes/matteringpress/'));
});

gulp.task('deleteall', function () {
    return del([
        '../../../Sites/wordpress/wp-content/themes/matteringpress/*'], {force:true}
    );
});

/*gulp.task('sync', (done) => {
    syncy(['./src/** /*'], '../../../../../../Sites/wordpress/wp-content/themes/matteringpress/', {base: './src/'})
      .then(() => {
        done();
      })
      .catch((err) => {
        done(err);
      });
  });*/

gulp.task('default', ['watch']);

gulp.task('cssc', ['css', 'deletecss', 'copycss']);

gulp.task('syncall', ['css', 'scripts', 'deleteall', 'copyall']);