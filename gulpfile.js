const { src, dest, parallel, watch } = require('gulp');
const postcss = require('gulp-postcss');
const concat = require('gulp-concat');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const purgecss = require('gulp-purgecss');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const gzip = require('gulp-gzip');
const brotli = require('gulp-brotli');
const replace = require('gulp-replace');
const nested = require('postcss-nested');
var cssimport = require('gulp-cssimport');

function css() {
	var plugins = [nested(), autoprefixer(), cssnano()];
	return src('css/theme.css')
		.pipe(concat('main.css'))
		.pipe(postcss(plugins))
		.pipe(
			purgecss({
				content: ['**/*.php'],
				defaultExtractor: content =>
					content.match(/[A-Za-z0-9-_:!/]+/g) || []
			})
		)
		.pipe(dest('./dist'));
}

function js() {
	return src('js/*.js', { sourcemaps: true })
		.pipe(concat('main.js'))
		.pipe(
			babel({
				presets: ['@babel/preset-env']
			})
		)

		.pipe(dest('./dist', { sourcemaps: true }));
}

exports.js = js;
exports.css = css;
exports.default = parallel(css, js);
exports.watch = () => {
	watch('css/theme.css', css);
	watch('templates/**/*.twig', css);
	watch('js/*.js', js);
};
