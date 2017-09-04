let mix = require('laravel-mix');

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
mix.scripts([
    'resources/assets/js/libraries/jquery.js',
    'resources/assets/js/libraries/gmap3.clusterer.js',
    'resources/assets/js/libraries/gmap3.infobox.js',
    'resources/assets/libraries/bxslider/jquery.bxslider.min.js',
    'resources/assets/libraries/chosen/chosen.jquery.min.js',
    'resources/assets/libraries/isotope/jquery.isotope.min.js',
    'resources/assets/libraries/rangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js',
    'resources/assets/libraries/flot/jquery.flot.js',
    'resources/assets/libraries/flot/jquery.flot.canvas.js',
    'resources/assets/libraries/flot/jquery.flot.resize.js',
    'resources/assets/libraries/flot/jquery.flot.time.js',
    'resources/assets/libraries/bootstrap/javascripts/bootstrap/carousel.js',
    'resources/assets/libraries/bootstrap/javascripts/bootstrap/collapse.js',
    'resources/assets/libraries/bootstrap/javascripts/bootstrap/dropdown.js',
    'resources/assets/libraries/bootstrap/javascripts/bootstrap/tab.js',
    'resources/assets/libraries/bootstrap/javascripts/bootstrap/transition.js',
    'resources/assets/libraries/bootstrap/javascripts/bootstrap/button.js',
    'resources/assets/libraries/rateyo/jquery.rateyo.min.js',
    'resources/assets/js/director.js',
    'resources/assets/js/graph.js',
    'resources/assets/js/map.js',
    'resources/assets/js/custom.js',
    'resources/assets/js/gmap3.js',
], 'public/js/vendor.min.js');

/** FONTS **/
// mix.copyDirectory('resources/assets/libraries/bootstrap-sass/fonts/bootstrap', 'public/fonts/');
mix.copyDirectory('resources/assets/fonts', 'public/fonts/');
mix.copyDirectory('resources/assets/libraries/font-awesome/fonts', 'public/fonts/');

/** VIDEO **/
// mix.copy('resources/assets/videos/*.*', 'public/videos/');

/** SITE IMAGES **/
mix.copyDirectory('resources/assets/img/', 'public/images');
mix.copy('resources/assets/libraries/chosen/chosen-sprite.png','public/images')
mix.copy('resources/assets/libraries/chosen/chosen-sprite@2x.png','public/images')


/** CSS, SCSS */

mix.styles([
    'resources/assets/libraries/font-awesome/css/font-awesome.min.css',
    'resources/assets/libraries/chosen/chosen.css',
    'resources/assets/libraries/rangeSlider/css/ion.rangeSlider.css',
    'resources/assets/libraries/rangeSlider/css/ion.rangeSlider.skinNice.css',
    'resources/assets/libraries/rateyo/jquery.rateyo.min.css',
    // 'resources/assets/css/variants/directory.css',
    'resources/assets/libraries/bootstrap-vertical-tabs/bootstrap.vertical-tabs.min.css'
], 'public/css/vendor.min.css');

mix.sass('resources/assets/scss/directory.scss', 'public/css');

mix.version();