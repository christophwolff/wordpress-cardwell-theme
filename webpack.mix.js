let mix = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
const proxyconfig = require('./proxyconfig')
const resources = 'resources'
mix.setResourceRoot('../')

if (!mix.inProduction()) {
	mix.webpackConfig({ devtool: "inline-source-map" }).sourceMaps()
	var publicPath = 'dev'
	mix.setPublicPath(publicPath)
} else {
	var publicPath = 'dist'
	mix.setPublicPath(publicPath)
}

mix.version()
mix.js(`${resources}/js/theme.js`, `${publicPath}/scripts`)
   .sass(`${resources}/sass/theme.scss`, `${publicPath}/styles`)
mix.js(`${resources}/js/turbolinks.js`, `${publicPath}/scripts`)
//Gutenberg Styles for Backend and Frontend
mix.sass(`${resources}/sass/blocks.scss`, `${publicPath}/styles`);

mix.copy(`${resources}/js/vendor/*`, `${publicPath}/scripts/vendor`).version()
mix.options({
	processCssUrls: false,
})

mix.copy(`${resources}/images`, `${publicPath}/images`)

mix.browserSync({
  	proxy: proxyconfig.target,
  	// Make navigatin with Turbolinks work in browsersync
	snippetOptions: {
      rule: {
        match: /<\/head>/i,
        fn: function (snippet, match) {
          return snippet + match
        }
      }
    }
})
