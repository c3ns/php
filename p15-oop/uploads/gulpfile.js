const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();
const rename = require("gulp-rename");
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const plumber =require('gulp-plumber');

gulp.task('test', function () {
    console.log('gulp is running')
});

gulp.task('browser-sync', function () {
    browserSync.init({
        proxy: "http://localhost:80/p25-coffee/dist/"
    });
});

gulp.task('js', function () {

    gulp.src('./src/js/*.js')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(concat('bundle.js'))
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('dist/js'));
    gulp.src('./src/js/*.js')
        .pipe(gulp.dest('dist/js/files'));

});


gulp.task('compile', function () {
    return gulp.src('./src/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({debug: true}, function (details) {
            console.log(details.name + ': ' + details.stats.originalSize);
            console.log(details.name + ': ' + details.stats.minifiedSize);
        }))
        .pipe(gulp.dest('dist/css'))
});

gulp.task('watch', function () {
    gulp.watch('./src/sass/**/*.scss', ['compile']);
    gulp.watch('./dist/**/*.php').on("change", browserSync.reload);
    gulp.watch('./src/js/*.js', ['js']).on("change", browserSync.reload);
    gulp.watch('./dist/css/*.css').on("change", browserSync.reload);
});

gulp.task('default', ['watch', 'browser-sync']);