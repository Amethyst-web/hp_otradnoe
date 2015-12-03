/*создание в проекте ссылки на gulp и
установка в проект модулей
npm install -g gulp
npm install less-plugin-autoprefix gulp-less gulp-rename --save-dev
npm link gulp --save-dev
*/
var LessPluginAutoPrefix = require('less-plugin-autoprefix'),
    autoprefix = new LessPluginAutoPrefix({browsers: ["last 2 versions"]});

// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var less = require('gulp-less');
var rename = require('gulp-rename');


// Compile Our Less
gulp.task('less', function() {
    return gulp.src(
      [
        'src/less/style.less'
      ]
    )
    .pipe(less({
          compress: false,
          plugins: [autoprefix]
    }))
    .pipe(gulp.dest('dist/css/'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('src/less/*.less', ['less']);
});

// Default Task
gulp.task('default', ['less', 'watch']);
