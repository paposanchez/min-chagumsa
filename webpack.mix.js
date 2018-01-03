let mix = require('laravel-mix');

let nodeDir = 'node_modules/';
let resourceDir = 'resources/assets/';
let baseDir = 'resources/assets/themes/v2/';
let publicDir = 'public/';
let targetDir = 'public/assets/';

//################# 이미지
// mix.copyDirectory(assetsDir + 'img/', distDir + 'img');
mix.copy(baseDir + 'fonts/', targetDir + 'fonts/', false);
mix.copy(baseDir + 'img/', targetDir + 'img/', false);
mix.copy(resourceDir + 'img/', targetDir + 'img/', false);
mix.copy(baseDir + 'vendors/', targetDir + 'vendors/', false);
mix.copy(resourceDir + 'js/plugin/', targetDir + 'js/plugin/', false);
mix.copy(resourceDir + 'js/languages/', targetDir + 'js/languages/', false);
mix.sass(resourceDir + 'scss/core.scss', 'assets/css/');
mix.styles([
        targetDir + 'css/core.css',
        baseDir + 'css/inc/app.css',
], targetDir + 'css/app.css');

mix.scripts([
        baseDir + 'vendors/bower_components/jquery/dist/jquery.js',
        baseDir + 'vendors/bower_components/bootstap/dist/js/bootstrap.js',
], targetDir + 'js/base.js');

mix.scripts([
        resourceDir + 'js/theme.js',
        baseDir + 'js/app.js',
], targetDir + 'js/app.admin.js');

mix.scripts([
        resourceDir + 'js/theme.js',
        baseDir + 'js/app.js'
], targetDir + 'js/app.front.js');


if (mix.config.inProduction) {
        mix.sourceMaps();
        // mix.version();
}
