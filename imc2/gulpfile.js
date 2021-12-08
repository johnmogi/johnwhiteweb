const gulp = require('gulp');
// const uglify = require('gulp-uglify');
const uglify = require('gulp-uglify-es').default;
const sourcemaps = require('gulp-sourcemaps');
const sassImport = require('gulp-sass-import');
const sass = require('gulp-sass');
const watch = require('gulp-watch');
let browsersync = require( 'browser-sync' ).create();



let PROJECT_URL = 'http://localhost/imc2/';
let PROJECT_PORT = 8888;
let LISTEN_FILES = [ '**/*.php' ];


// Javascript Minification
// gulp.task('minifyJs', () =>
//     gulp.src('src/js/scripts.js')
//         .pipe(uglify())
//         .pipe(gulp.dest('./js'))
// );
gulp.task("minifyJs", () =>
    gulp.src("src/js/scripts.js")
        .pipe(uglify())
        .pipe(gulp.dest("./js"))
);

// compile css
gulp.task('sass', () =>
    gulp.src('src/sass/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sassImport({
            filename: '_responsive'
        }))
        .pipe(sass({outputStyle: 'compressed'})
            .on('error', sass.logError))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'))
        .pipe( browsersync.stream() )
);

// gulp.task('watch', function () {
//     gulp.watch('src/sass/*.scss', gulp.series('sass'));
//     gulp.watch('src/js/scripts.js', gulp.series('minifyJs'));
//     gulp.watch('src/img/*', gulp.series('imageMin'));
// });

gulp.task( 'browser-sync', function () {

    browsersync.init( {
        proxy : PROJECT_URL,
        port : PROJECT_PORT,
        injectChanges : true
    } );

    gulp.watch( LISTEN_FILES ).on( 'change', browsersync.reload );
    gulp.watch('src/sass/*.scss', gulp.series('sass'));
    gulp.watch('src/js/scripts.js', gulp.series('minifyJs'));
} );
gulp.task('default', gulp.parallel('browser-sync'));