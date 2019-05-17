var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer');

var concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify-es').default;

gulp.task('scss', function() {
  gulp.src('src/scss/styles.scss')
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(autoprefixer({
          browsers: ['last 2 versions'],
          cascade: false
      }))
      .pipe(gulp.dest('assets/css'));
});

gulp.task('scripts', function() {
  gulp.src('src/js/**/*.js')
      .pipe(concat('scripts.js'))
      .pipe(gulp.dest('assets/js'))
      .pipe(rename('scripts.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest('assets/js'))
});

var libs = [
  // 'node_modules/jquery/dist/jquery.min.js',
  'node_modules/popper.js/dist/umd/popper.js',
  'node_modules/bootstrap/dist/js/bootstrap.js',
  // 'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
  // 'node_modules/slick-carousel/slick/slick.min.js',
  'node_modules/scrollreveal/dist/scrollreveal.min.js',
  'node_modules/particles.js/particles.js',
  'src/js-libs/slick.js'
];


gulp.task('libs-scripts', function() {
  gulp.src(libs)
      .pipe(concat('libs-scripts.js'))
      .pipe(gulp.dest('assets/js'))
      .pipe(rename('libs-scripts.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest('assets/js'))
});

var sphere = [
    'src/sphere-js/three.js',
    'src/sphere-js/background.js',
    'src/sphere-js/canvas.js'
];

gulp.task('sphere-scripts', function() {
    gulp.src(sphere)
        .pipe(concat('sphere-scripts.js'))
        .pipe(gulp.dest('assets/js'))
        .pipe(rename('sphere-scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'))
});

gulp.task('default', function() {
  gulp.run("scss");
  gulp.run("scripts");
  gulp.run("libs-scripts");
  gulp.run("sphere-scripts");

  gulp.watch('src/scss/**/*.scss', function() {
    gulp.run('scss');
  });

  gulp.watch('src/js/**/*.js', function() {
    gulp.run('scripts');
  });
});
