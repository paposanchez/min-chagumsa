"use strict";
//
//window._ = require('lodash');
//
///**
// * We'll load jQuery and the Bootstrap jQuery plugin which provides support
// * for JavaScript based Bootstrap features such as modals and tabs. This
// * code may be modified to fit the specific needs of your application.
// */
//
//window.$ = window.jQuery = require('jquery');
//require('bootstrap-sass');
//
///**
// * Vue is a modern JavaScript library for building interactive web interfaces
// * using reactive data binding and reusable components. Vue's API is clean
// * and simple, leaving you to focus on building your next great project.
// */
//window.Vue = require('vue');
//require('vue-resource');
////Vue.http.interceptors.push((request, next) => {
////    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
////    next();
////});


//**************************************************//
var ZFOOP = {
        Languages: {},
        Settings: {},
        Common: {
                fullscreen: function () {
                        var
                        fullScreenApi = {
                                supportsFullScreen: false,
                                nonNativeSupportsFullScreen: false,
                                isFullScreen: function () {
                                        return false;
                                },
                                requestFullScreen: function () {},
                                cancelFullScreen: function () {},
                                fullScreenEventName: '',
                                prefix: ''
                        },
                        browserPrefixes = 'webkit moz o ms khtml'.split(' ');

                        // check for native support
                        if (typeof document.cancelFullScreen != 'undefined') {
                                fullScreenApi.supportsFullScreen = true;
                        } else {
                                // check for fullscreen support by vendor prefix
                                for (var i = 0, il = browserPrefixes.length; i < il; i++) {
                                        fullScreenApi.prefix = browserPrefixes[i];

                                        if (typeof document[fullScreenApi.prefix + 'CancelFullScreen' ] != 'undefined') {
                                                fullScreenApi.supportsFullScreen = true;

                                                break;
                                        }
                                }
                        }

                        // update methods to do something useful
                        if (fullScreenApi.supportsFullScreen) {
                                fullScreenApi.fullScreenEventName = fullScreenApi.prefix + 'fullscreenchange';

                                fullScreenApi.isFullScreen = function () {
                                        switch (this.prefix) {
                                                case '':
                                                return document.fullScreen;
                                                case 'webkit':
                                                return document.webkitIsFullScreen;
                                                default:
                                                return document[this.prefix + 'FullScreen'];
                                        }
                                }
                                fullScreenApi.requestFullScreen = function (el) {
                                        return (this.prefix === '') ? el.requestFullScreen() : el[this.prefix + 'RequestFullScreen']();
                                }
                                fullScreenApi.cancelFullScreen = function (el) {
                                        return (this.prefix === '') ? document.cancelFullScreen() : document[this.prefix + 'CancelFullScreen']();
                                }
                        } else if (typeof window.ActiveXObject !== "undefined") { // IE.
                                fullScreenApi.nonNativeSupportsFullScreen = true;
                                fullScreenApi.requestFullScreen = fullScreenApi.requestFullScreen = function (el) {
                                        var wscript = new ActiveXObject("WScript.Shell");
                                        if (wscript !== null) {
                                                wscript.SendKeys("{F11}");
                                        }
                                }
                                fullScreenApi.isFullScreen = function () {
                                        return document.body.clientHeight == screen.height && document.body.clientWidth == screen.width;
                                }
                        }
                },
                isHighDensity: function () {
                        return window.matchMedia && (window.matchMedia("only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)").matches || window.matchMedia("only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)").matches) || window.devicePixelRatio && window.devicePixelRatio > 1.3
                },
                scrollbarWidth: function () {
                        var e = jQuery('<div style="width: 100%; height:200px;">test</div>'), a = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append(e), i = e[0], e = a[0];
                        return jQuery("body").append(e), i = i.offsetWidth, a.css("overflow", "scroll"), e = e.clientWidth, a.remove(), i - e
                },
                randID_generator: function () {
                        var e = String.fromCharCode(65 + Math.floor(26 * Math.random()));
                        return e + Date.now()
                },
                detectIE: function () {
                        var e = window.navigator.userAgent, a = e.indexOf("MSIE ");
                        return 0 < a ? parseInt(e.substring(a + 5, e.indexOf(".", a)), 10) : 0 < e.indexOf("Trident/") ? (a = e.indexOf("rv:"), parseInt(e.substring(a + 3, e.indexOf(".", a)), 10)) : (a = e.indexOf("Edge/"), 0 < a && parseInt(e.substring(a + 5, e.indexOf(".", a)), 10))
                },
                hex2rgba: function (e, a) {
                        return e = e.replace("#", ""), r = parseInt(e.substring(0, 2), 16), g = parseInt(e.substring(2, 4), 16), b = parseInt(e.substring(4, 6), 16), result = "rgba(" + r + "," + g + "," + b + "," + a / 100 + ")", result
                },
                lsTest: function () {
                        var e = "test";
                        try {
                                return localStorage.setItem(e, e), localStorage.removeItem(e), !0
                        } catch (a) {
                                return !1
                        }
                },
                seed: function (len) {

                        if (!len) {
                                len = 10;
                        }
                        var text = '';
                        var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

                        for (var i = 0; i < len; i++) {
                                text += chars.charAt(Math.floor(Math.random() * chars.length));
                        }
                        return text;
                },
                deparam: function (str) {
                        var pairs = str.split('&');
                        var result = {};
                        pairs.forEach(function (pair) {
                                pair = pair.split('=');
                                result[pair[0]] = decodeURIComponent(pair[1] || '');
                        });
                        return JSON.parse(JSON.stringify(result));

                },
                array_key_exists: function (key, search) {
                        //  discuss at: http://phpjs.org/functions/array_key_exists/
                        // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                        // improved by: Felix Geisendoerfer (http://www.debuggable.com/felix)
                        //   example 1: array_key_exists('kevin', {'kevin': 'van Zonneveld'});
                        //   returns 1: true

                        if (!search || (search.constructor !== Array && search.constructor !== Object)) {
                                return false;
                        }

                        return key in search;
                },

                number_format : function(val){
                        if(val==0) return 0;

                        var reg = /(^[+-]?\d+)(\d{3})/;
                        var n = (val + '');

                        while (reg.test(n)) n = n.replace(reg, '$1' + ',' + '$2');

                        return n;
                },

                str_pad: function (input, pad_length, pad_string, pad_type) {
                        //  discuss at: http://phpjs.org/functions/str_pad/
                        // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                        // improved by: Michael White (http://getsprink.com)
                        //    input by: Marco van Oort
                        // bugfixed by: Brett Zamir (http://brett-zamir.me)
                        //   example 1: str_pad('Kevin van Zonneveld', 30, '-=', 'STR_PAD_LEFT');
                        //   returns 1: '-=-=-=-=-=-Kevin van Zonneveld'
                        //   example 2: str_pad('Kevin van Zonneveld', 30, '-', 'STR_PAD_BOTH');
                        //   returns 2: '------Kevin van Zonneveld-----'

                        var half = '',
                        pad_to_go;

                        var str_pad_repeater = function (s, len) {
                                var collect = '',
                                i;

                                while (collect.length < len) {
                                        collect += s;
                                }
                                collect = collect.substr(0, len);

                                return collect;
                        };

                        input += '';
                        pad_string = pad_string !== undefined ? pad_string : ' ';

                        if (pad_type !== 'STR_PAD_LEFT' && pad_type !== 'STR_PAD_RIGHT' && pad_type !== 'STR_PAD_BOTH') {
                                pad_type = 'STR_PAD_RIGHT';
                        }
                        if ((pad_to_go = pad_length - input.length) > 0) {
                                if (pad_type === 'STR_PAD_LEFT') {
                                        input = str_pad_repeater(pad_string, pad_to_go) + input;
                                } else if (pad_type === 'STR_PAD_RIGHT') {
                                        input = input + str_pad_repeater(pad_string, pad_to_go);
                                } else if (pad_type === 'STR_PAD_BOTH') {
                                        half = str_pad_repeater(pad_string, Math.ceil(pad_to_go / 2));
                                        input = half + input + half;
                                        input = input.substr(0, pad_length);
                                }
                        }

                        return input;
                },
                filesize: function (bytes, decimals) {
                        if (bytes == 0)
                        return '0 Byte';
                        var k = 1000;
                        var dm = decimals + 1 || 3;
                        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                        var i = Math.floor(Math.log(bytes) / Math.log(k));
                        return (bytes / Math.pow(k, i)).toPrecision(dm) + ' ' + sizes[i];
                },
                alert: function (message, type, autoclose) {
                        var id = ZFOOP.Common.randID_generator();
                        var html = '<div class="alert alert-' + (type ? type : 'default');
                        html += ' alert-dismissable"';
                        html += ' id="' + id + '"';
                        html += '><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        html += message;
                        html += '</div>';
                        var body = document.body || document.getElementsByTagName('body')[0];
                        body.insertBefore(html, document.getElementById('header'));
                }

        }

};

$(function () {
        ZFOOP.Settings.locale = $("html").attr("locale");
        ZFOOP.Settings.lang = $("html").attr("lang");

        //######################## default
        // IE10 viewport hack for Surface/desktop Windows 8 bug
        // See Getting Started docs for more information
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement("style");
                msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
                document.getElementsByTagName("head")[ 0 ].appendChild(msViewportStyle);
        }

});
