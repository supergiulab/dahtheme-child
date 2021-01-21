var path = require('path'),
	gulp = require('gulp'),
	settings = require('./config/settings'),
	webpack = require('webpack'),
	browserSync = require('browser-sync').create(),
	postcss = require('gulp-postcss'),
	rgba = require('postcss-hexrgba'),
	sass = require("gulp-sass"),
	sourcemaps = require("gulp-sourcemaps"),
	cssnano = require("cssnano"),
	autoprefixer = require('autoprefixer'),
	cssvars = require('postcss-simple-vars'),
	nested = require('postcss-nested'),
	cssImport = require('postcss-import'),
	mixins = require('postcss-mixins'),
	colorFunctions = require('postcss-color-function');

const entryCss = settings.themeLocation + '/assets/theme/css/style.scss';
const entryAdminCss = settings.themeLocation + '/assets/admin/css/style.scss';
const adminDest = settings.themeLocation + '/assets/admin';

let sassOpt = {
	errLogToConsole: true,
	outputStyle: "expanded" // "compressed"
}

gulp.task('css:theme', (done) => {
	gulp.src(entryCss)
	.pipe(sass(sassOpt).on('error', sass.logError))
	.pipe( sourcemaps.init({ loadMaps: true }) )
	.pipe(postcss([ autoprefixer(), cssnano() ]))
	.pipe( sourcemaps.write( './' ) )
	.pipe(gulp.dest(settings.themeLocation))
	.pipe(browserSync.reload({stream: true}))
	done();
});

gulp.task('css:admin', (done) => {
	gulp.src(entryAdminCss)
	.pipe(sass(sassOpt).on('error', sass.logError))
	.pipe( sourcemaps.init({ loadMaps: true }) )
	.pipe(postcss([ autoprefixer(), cssnano() ]))
	.pipe( sourcemaps.write( './' ) )
	.pipe(gulp.dest(adminDest))
	.pipe(browserSync.reload({stream: true}))
	done();
});

gulp.task('js:theme', function(callback) {
	webpack(require('./config/theme.config.js'), function(err, stats) {
		if (err) {
			console.log(err.toString());
		}

		console.log(stats.toString());
		callback();
	});
});

gulp.task('js:admin', function(callback) {
	webpack(require('./config/admin.config.js'), function(err, stats) {
		if (err) {
			console.log(err.toString());
		}

		console.log(stats.toString());
		callback();
	});
});

gulp.task('watch', function() {
	browserSync.init({
		notify: false,
		proxy: settings.urlToPreview,
		ghostMode: false
	});

	gulp.watch('./**/*.php', function() {
		browserSync.reload();
	});
	gulp.watch(settings.themeLocation + '/assets/commons/css/**/*.scss', gulp.parallel('waitThemeStyles', 'waitAdminStyles'));
	gulp.watch(settings.themeLocation + '/assets/theme/css/**/*.scss', gulp.parallel('waitThemeStyles'));
	gulp.watch([settings.themeLocation + '/assets/theme/js/app.js', settings.themeLocation + '/assets/theme/js/mods/*.js'], gulp.parallel('waitThemeScripts'));
	gulp.watch(settings.themeLocation + '/assets/admin/css/**/*.scss', gulp.parallel('waitAdminStyles'));
	gulp.watch([settings.themeLocation + '/assets/admin/js/app.js', settings.themeLocation + '/assets/admin/js/mods/*.js'], gulp.parallel('waitAdminScripts'));
});

gulp.task('waitThemeStyles', gulp.series('css:theme', function() {
	return gulp.src(settings.themeLocation + '/style.css')
	.pipe(browserSync.stream());
}));

gulp.task('waitThemeScripts', gulp.series('js:theme', function(cb) {
	browserSync.reload();
	cb();
}));

gulp.task('waitAdminStyles', gulp.series('css:admin', function() {
	return gulp.src(settings.themeLocation + '/style.css')
	.pipe(browserSync.stream());
}));

gulp.task('waitAdminScripts', gulp.series('js:admin', function(cb) {
	browserSync.reload();
	cb();
}));