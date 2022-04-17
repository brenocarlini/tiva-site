const gulp = require('gulp');
const sass = require('gulp-sass');

gulp.task( 'sass', () => {
    return gulp.src('dev/scss/main.scss')
                .pipe(sass({outputStyle: 'compressed'})
                .on('error', sass.logError))
                .pipe( gulp.dest('assets/css') );
} );

gulp.task( 'default', () => { 
    gulp.watch( 'dev/scss/**/*.scss', gulp.series( 'sass' ) );
 } );

