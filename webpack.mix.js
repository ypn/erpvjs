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

mix//.js('resources/assets/js/app.js', 'public/js')
   //.sass('resources/assets/sass/app.scss', 'public/css');
   //.react('resources/assets/js/components/datatable/table-master.js','public/js/base');
   //.react('Modules/QuanLyQuyTrinh/Resources/assets/themlineduyet/master.js','public/modules/quanliquytrinh/lineduyet')
   //.react('resources/assets/js/components/googlemap/map-master.js','public/js/base')
     .react('Modules/QuanLyXeRaVao/Resources/assets/realtimetracking/car-tracking-master.js','public/modules/quanlyxeravao');
