var fs = require('fs');
var config = JSON.parse(fs.readFileSync('./quartier.json'));

var gulp = require('gulp');
var merge = require('merge-stream');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var rename = require('gulp-rename');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglifyjs');

var inputDesktopSass = config.path.quartier + config.sass_desktop ;
var outputDesktopCss = config.path.quartier + config.local_desktop;
var outputProdDesktop = config.path.quartier + config.outputCssMinifyDesktop;
var outputCssEndDesktop = config.path.quartier + config.outputCssMinifyDesktop;
var inputJsFile = config.path.quartier + config.js_desktop;
var inputForVendor = config.path.quartier + config.js_vendor;
var distJs = config.path.quartier + config.dist;

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

gulp.task('sass', function () {
  var desktopSass =  gulp
    // Find all `.scss` files from the `stylesheets/` folder
    .src(inputDesktopSass)
    .pipe(sourcemaps.init())
    // Run Sass on those files
    .pipe(sass(sassOptions).on('error', sass.logError))
    // Write the resulting CSS in the output folder
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest(outputDesktopCss));

    return merge(desktopSass);
});

gulp.task('prod', ['sass'], function () {
  var prod_desktop =  gulp
    // Find all `.scss` files from the `stylesheets/` folder
    .src(outputCssEndDesktop)
    // Run Sass on those files
    .pipe(sass({outputStyle : 'compressed'}))
    .pipe(rename('quartier.css'))
    .pipe(gulp.dest(outputDesktopCss));

   return merge(prod_desktop);
});

// configure the jshint task
gulp.task('jshint', function() {
  return gulp.src(inputJsFile)
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('watch', function() {
 gulp
    // Watch the input folder for change,
    // and run `sass` task when something happens
    .watch(inputDesktopSass, ['prod','sass'])
    // When there is a change,
    // log a message in the console
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
gulp
    // Watch the input folder for change,
    // and run `sass` task when something happens
    .watch(inputJsFile, ['jshint']);
});

gulp.task('uglify', function() {
  gulp.src(inputForVendor)
    .pipe(uglify('vendor.js', {
      outSourceMap: true
    }))
    .pipe(gulp.dest(distJs))
});

gulp.task('default', ['sass', 'watch', 'uglify']);