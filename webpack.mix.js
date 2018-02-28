let mix = require('laravel-mix');

let nodeDir = 'node_modules/';
let resourceDir = 'resources/assets/';
let baseDir = 'resources/assets/themes/v2/';
let publicDir = 'public/';
let targetDir = 'public/assets/';

//################# 이미지
mix.copyDirectory(baseDir + 'fonts/', targetDir + 'fonts');
mix.copyDirectory(baseDir + 'img/', targetDir + 'img');
mix.copyDirectory(resourceDir + 'img/', targetDir + 'img');
mix.copyDirectory(baseDir + 'vendors/', targetDir + 'vendors');
mix.copyDirectory(resourceDir + 'js/plugin/', targetDir + 'js/plugin');
mix.copyDirectory(resourceDir + 'js/languages/', targetDir + 'js/languages');
mix.copyDirectory(resourceDir + 'vendors/document/', targetDir + 'vendors/document');

// file upload
mix.copyDirectory(nodeDir + 'fine-uploader/', targetDir + 'vendors/fine-uploader');
mix.copyDirectory(nodeDir + 'select2/dist/', targetDir + 'vendors/select2');
// mix.copyDirectory(nodeDir + 'select2/src/scss', targetDir + 'vendors/select2/scss');




mix.sass(resourceDir + 'scss/core.scss', targetDir +'css/');

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
        // mix.sourceMaps();
        // mix.version();
}
