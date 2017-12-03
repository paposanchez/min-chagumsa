const {mix} = require('laravel-mix')
assetsDir = 'resources/assets/',
nodeDir = 'node_modules/',
publicDir = 'public/',
distDir = 'public/assets/';
mix

//##### Themes
.copy(assetsDir + 'themes/', distDir + 'themes', false)


//##### 이미지
.copy(assetsDir + 'img/', distDir + 'img', false)
//##### 폰트
.copy(nodeDir + 'bootstrap-sass/assets/fonts/', distDir + 'fonts/bootstrap')
.copy(nodeDir + 'lato-font/fonts/', distDir + 'fonts/lato')
.copy(nodeDir + 'material-design-icons/iconfont/', distDir + 'fonts/material-design-icons')
.copy(nodeDir + 'font-awesome/fonts/', distDir + 'fonts/font-awesome')

//##### vendor
.copy(nodeDir + 'summernote/dist/', distDir + 'vendor/summernote', false)
.copy(nodeDir + 'summernote/lang', distDir + 'vendor/summernote/lang', false)
.copy(nodeDir + 'summernote/plugin', distDir + 'vendor/summernote/plugin', false)

.copy(nodeDir + 'select2/dist/', distDir + 'vendor/select2', false)
.copy(nodeDir + 'select2/src/scss', distDir + 'vendor/select2/scss', false)
.sass(distDir + 'vendor/select2/scss/core.scss', distDir + 'vendor/select2/css')

// uploader
.copy(nodeDir + 'fine-uploader/', distDir + 'vendor/fine-uploader', false)
//datepicker
.copy(nodeDir + 'pikaday/', distDir + 'vendor/pikaday', false)

//page transition
.copy(assetsDir + 'vendor/tympanus', distDir + 'vendor/tympanus', false)

//taginput
.copy(assetsDir + 'vendor/tagsinput', distDir + 'vendor/tagsinput', false)

// charts
.copy(nodeDir + 'highcharts/', distDir + 'vendor/highcharts', false)
//        .copy(nodeDir + 'd3/', distDir + 'vendor/d3', false)
//        // d3기반 차트 http://metricsgraphicsjs.org/examples.htm
//        .copy(nodeDir + 'metrics-graphics/dist', distDir + 'vendor/metrics-graphics', false)

// 파티클 애니메이션
//        .copy(nodeDir + 'particles.js/particles.js', distDir + 'vendor')
// 배경이미지 설정 http://srobbin.com/jquery-plugins/backstretch/
//        .copy(nodeDir + 'jquery-backstretch/jquery.backstretch.min.js', distDir + 'vendor')

// js plugins
.copy(assetsDir + 'js/plugin/', distDir + 'js/plugin')

.combine([
        nodeDir + 'animate.css/animate.css',
        nodeDir + 'bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css',
        // nodeDir + 'perfect-scrollbar/dist/css/perfect-scrollbar.scss',
        nodeDir + 'titatoggle/dist/titatoggle-dist.css',
        nodeDir + 'ekko-lightbox/dist/ekko-lightbox.css'
], distDir + 'css/vendor.css')

.sass(assetsDir + 'scss/app.scss', distDir + 'css')

//##### application
.combine([
        nodeDir + 'jquery/dist/jquery.js',
        nodeDir + 'jquery.easing/jquery.easing.js',
        //                nodeDir + 'jquery-bez/src/jquery.bez.js',
        //                nodeDir + 'bootstrap-sass/assets/javascripts/bootstrap-sprockets.js',
        nodeDir + 'bootstrap-sass/assets/javascripts/bootstrap.js',
        nodeDir + 'jquery-validation/dist/jquery.validate.js',
        nodeDir + 'jquery-validation/dist/additional-methods.js',
        // nodeDir + 'perfect-scrollbar/dist/js/perfect-scrollbar.jquery.js',
        nodeDir + 'moment/min/moment-with-locales.js',
        nodeDir + 'pikaday/pikaday.js',
        nodeDir + 'jquery-knob/js/jquery.knob.js',
        nodeDir + 'bootstrap-notify/bootstrap-notify.js',
        nodeDir + 'bootstrap-touchspin/src/jquery.bootstrap-touchspin.js',
        nodeDir + 'jquery-file-download/src/Scripts/jquery.fileDownload.js',
        nodeDir + 'ekko-lightbox/dist/ekko-lightbox.js',
        // file uploader simple
        // nodeDir + 'jquery-simple-upload/simpleUpload.js',

        assetsDir + 'vendor/jasny/js/fileinput.js',
        assetsDir + 'vendor/jasny/js/inputmask.js',

        nodeDir + '/bxslider/dist/jquery.bxslider.js',

        assetsDir + 'js/app.js'
], distDir + 'js/app.js');
if (mix.config.inProduction) {
        mix.version();
}
