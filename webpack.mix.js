let mix = require('laravel-mix');

let nodeDir = 'node_modules/';
let resourceDir = 'resources/assets/';
let baseDir = 'resources/assets/themes/v2/';
let publicDir = 'public/';
let targetDir = 'public/assets/';

//################# 이미지
// mix.copyDirectory(assetsDir + 'img/', distDir + 'img');
mix.copyDirectory(baseDir + 'fonts/', targetDir + 'fonts');
mix.copyDirectory(baseDir + 'img/', targetDir + 'img');
mix.copyDirectory(resourceDir + 'img/', targetDir + 'img');
mix.copyDirectory(baseDir + 'vendors/', targetDir + 'vendors');
mix.copyDirectory(resourceDir + 'js/plugin/', targetDir + 'js/plugin');
mix.copyDirectory(resourceDir + 'js/languages/', targetDir + 'js/languages');


// mix.less(baseDir + 'less/app.less', baseDir + 'css/inc/app.css');
mix.sass(resourceDir + 'scss/core.scss', 'assets/css/');

mix.styles([
        targetDir + 'css/core.css',
        baseDir + 'css/inc/app.css',
], targetDir + 'css/app.css');

mix.scripts([
        baseDir + 'vendors/bower_components/jquery/dist/jquery.js',
        baseDir + 'vendors/bower_components/bootstrap/dist/js/bootstrap.js'
], targetDir + 'js/base.js');

mix.scripts([
        resourceDir + 'js/theme.admin.js',
        resourceDir + 'js/app.js',
        // baseDir + 'js/app.js',

], targetDir + 'js/app.admin.js');

mix.scripts([
        resourceDir + 'js/app.js',
        resourceDir + 'js/theme.front.js',
        // baseDir + 'js/app.js'
], targetDir + 'js/app.front.js');


if (mix.config.inProduction) {
        mix.sourceMaps();
        // mix.version();
}
