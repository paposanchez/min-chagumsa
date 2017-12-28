const {mix} = require('laravel-mix')
nodeDir = 'node_modules/',
resourceDir = 'resources/assets/',
baseDir = 'resources/assets/themes/v2/',
publicDir = 'public/',
targetDir = 'public/assets/';
mix

.copy(baseDir + 'fonts/', targetDir + 'fonts/', false)
.copy(baseDir + 'img/', targetDir + 'img/', false)
.copy(resourceDir + 'img/', targetDir + 'img/', false)
.copy(baseDir + 'vendors/', targetDir + 'vendors/', false)
.copy(resourceDir + 'js/plugin/', targetDir + 'js/plugin/', false)
.copy(resourceDir + 'js/languages/', targetDir + 'js/languages/', false)

.sass(resourceDir + 'scss/core.scss', 'assets/css/')

.styles([
        targetDir + 'css/core.css',
        baseDir + 'css/inc/app.css',
], targetDir + 'css/app.css')



.scripts([
        baseDir + 'vendors/bower_components/jquery/dist/jquery.js',
        baseDir + 'vendors/bower_components/bootstap/dist/js/bootstrap.js',
], targetDir + 'js/base.js')

.scripts([
        baseDir + 'js/app.js',
        resourceDir + 'js/app.js',
], targetDir + 'js/app.js');


if (mix.config.inProduction) {
        mix.sourceMaps();
        // mix.version();
}
