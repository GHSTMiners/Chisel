const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 const NodePolyfillPlugin = require("node-polyfill-webpack-plugin");


mix.ts('resources/js/app.ts', 'public/js')
    .ts('resources/js/home.ts', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sourceMaps()
    .webpackConfig({
        resolve: {
          fallback: {
            "http": require.resolve("stream-http")
          }
        },
        plugins: [
          new NodePolyfillPlugin()
        ],
      }
    );
      
