var gulp = require('gulp');
var wpPot = require('gulp-wp-pot');
 
gulp.task('pot', function () {
    return gulp.src('*/*.php')
        .pipe(wpPot( {
            domain: 'wp-notes-widget',
            package: 'WP Notes Widget'
        } ))
        .pipe(gulp.dest('languages/wp-notes-widget.pot'));
});