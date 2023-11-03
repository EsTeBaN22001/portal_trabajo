const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss    = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');
const terser = require('gulp-terser-js');
const webp = require('gulp-webp');

const paths = {
	scss: 'src/scss/**/*.scss',
	js: 'src/js/**/*.js',
	img: 'src/img/**/*'
}

// css es una función que se puede llamar automaticamente
function css() {
	return src(paths.scss)
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(sourcemaps.write('.'))
		.pipe( dest('public/build/css') );
}

function cssDev(){
	return src(paths.scss)
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(postcss([autoprefixer()]))
		.pipe(sourcemaps.write('.'))
		.pipe(dest('public/build/css'))
}


function javascript() {
	return src(paths.js)
		.pipe(terser())
		.pipe(sourcemaps.write('.'))
		.pipe(dest('public/build/js'));
}

function javascriptDev(){
	return src(paths.js)
		.pipe(dest('public/build/js'))
}

function img() {
	return src(paths.img)
		.pipe( webp() )
		.pipe(dest('public/build/img'))
}

function watchArchives() {
	watch( paths.scss, css );
	watch( paths.js, javascript );
	watch( paths.img, img );
}

function watchArchivesDev(){
	watch( paths.scss, cssDev );
	watch( paths.js, javascriptDev);
	watch( paths.img, img);
}

exports.dev = watchArchivesDev;
exports.build = watchArchives;
exports.default = parallel(css, javascript,  img,  watchArchives ); 