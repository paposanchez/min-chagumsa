
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

    next();
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });














function isHighDensity() {
    return window.matchMedia && (window.matchMedia("only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)").matches || window.matchMedia("only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)").matches) || window.devicePixelRatio && window.devicePixelRatio > 1.3
}
function scrollbarWidth() {
    var e = jQuery('<div style="width: 100%; height:200px;">test</div>'), a = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append(e), i = e[0], e = a[0];
    return jQuery("body").append(e), i = i.offsetWidth, a.css("overflow", "scroll"), e = e.clientWidth, a.remove(), i - e
}
function randID_generator() {
    var e = String.fromCharCode(65 + Math.floor(26 * Math.random()));
    return e + Date.now()
}
function detectIE() {
    var e = window.navigator.userAgent, a = e.indexOf("MSIE ");
    return 0 < a ? parseInt(e.substring(a + 5, e.indexOf(".", a)), 10) : 0 < e.indexOf("Trident/") ? (a = e.indexOf("rv:"), parseInt(e.substring(a + 3, e.indexOf(".", a)), 10)) : (a = e.indexOf("Edge/"), 0 < a && parseInt(e.substring(a + 5, e.indexOf(".", a)), 10))
}
function hex2rgba(e, a) {
    return e = e.replace("#", ""), r = parseInt(e.substring(0, 2), 16), g = parseInt(e.substring(2, 4), 16), b = parseInt(e.substring(4, 6), 16), result = "rgba(" + r + "," + g + "," + b + "," + a / 100 + ")", result
}
function lsTest() {
    var e = "test";
    try {
        return localStorage.setItem(e, e), localStorage.removeItem(e), !0
    } catch (a) {
        return !1
    }
}
$(function() {
    "use strict";
    altair_page_onload.init(), altair_main_header.init(), altair_main_sidebar.init(), altair_secondary_sidebar.init(), altair_top_bar.init(), altair_page_heading.init(), altair_md.init(), altair_forms.init(), altair_helpers.truncate_text($(".truncate-text")), altair_helpers.full_screen(), altair_helpers.table_check()
}), jQuery.fn.reverse = [].reverse, $.fn.serializeObject = function() {
    var e = {}, a = this.serializeArray();
    return $.each(a, function() {
        void 0 !== e[this.name] ? (e[this.name].push || (e[this.name] = [e[this.name]]), e[this.name].push(this.value || "")) : e[this.name] = this.value || ""
    }), e
}, "undefined" != typeof $.fn.selectize && (Selectize.define("dropdown_after", function(e) {
    this.positionDropdown = function() {
        var e = this.$control, a = e.position(), i = a.left, t = a.top + e.outerHeight(!0) + 32;
        this.$dropdown.css({
            width: e.outerWidth(),
            top: t,
            left: i
        })
    }
}), Selectize.define("tooltip", function(e) {
    var a = this;
    this.setup = function() {
        var e = a.setup;
        return function() {
            e.apply(this, arguments);
            var a = this.$wrapper, i = this.$input;
            i.attr("title") && a.attr("title", i.attr("title")).attr("data-uk-tooltip", i.attr("data-uk-tooltip"))
        }
    }()
})), easing_swiftOut = [.35, 0, .25, 1], bez_easing_swiftOut = $.bez(easing_swiftOut);
var $body = $("body"), $html = $("html"), $document = $(document), $window = $(window), $page_content = $("#page_content"), $page_content_inner = $("#page_content_inner"), $sidebar_main = $("#sidebar_main"), $sidebar_main_toggle = $("#sidebar_main_toggle"), $sidebar_secondary = $("#sidebar_secondary"), $sidebar_secondary_toggle = $("#sidebar_secondary_toggle"), $topBar = $("#top_bar"), $pageHeading = $("#page_heading"), $header_main = $("#header_main"), header__main_height = 48;
altair_page_onload = {
    init: function() {
        $window.on("load", function() {
            altair_helpers.hierarchical_show(), altair_helpers.hierarchical_slide()
        })
    }
}, altair_page_content = {
    hide_content_sidebar: function() {
        $body.hasClass("header_double_height") || $html.css({
            paddingRight: scrollbarWidth(),
            overflow: "hidden"
        })
    },
    show_content_sidebar: function() {
        $body.hasClass("header_double_height") || $html.css({
            paddingRight: "",
            overflow: ""
        })
    }
}, altair_forms = {
    init: function() {
        altair_forms.textarea_autosize(), altair_forms.select_elements(), altair_forms.switches(), altair_forms.dynamic_fields()
    },
    textarea_autosize: function() {
        $textarea = $("textarea.md-input").not(".no_autosize"), $textarea.hasClass("selecize_init") && autosize.destroy($textarea), autosize($textarea), $textarea.addClass("selecize_init")
    },
    select_elements: function(e) {
        var a = e ? $(e).find("select"): $("[data-md-selectize],.data-md-selectize");
        a.each(function() {
            var e = $(this);
            if (!e.hasClass("selectized")) {
                var a = e.attr("data-md-selectize-bottom"), i = ["tooltip"];
                e.after('<div class="selectize_fix"></div>').selectize({
                    plugins: i,
                    hideSelected: !0,
                    dropdownParent: "body",
                    onDropdownOpen: function(e) {
                        e.hide().velocity("slideDown", {
                            begin: function() {
                                "undefined" != typeof a && e.css({
                                    "margin-top": "0"
                                })
                            },
                            duration: 200,
                            easing: easing_swiftOut
                        })
                    },
                    onDropdownClose: function(e) {
                        e.show().velocity("slideUp", {
                            complete: function() {
                                "undefined" != typeof a && e.css({
                                    "margin-top": ""
                                })
                            },
                            duration: 200,
                            easing: easing_swiftOut
                        })
                    },
                    onChange: function(a) {
                        e.attr("data-parsley-id") && e.parsley().validate()
                    }
                })
            }
        });
        var i = $("[data-md-selectize-inline]");
        i.each(function() {
            var e = $(this);
            if (!e.hasClass("selectized")) {
                var a = e.attr("data-md-selectize-bottom");
                e.after('<div class="selectize_fix"></div>').closest("div").addClass("uk-position-relative").end().selectize({
                    plugins: ["dropdown_after"],
                    dropdownParent: e.closest("div"),
                    hideSelected: !0,
                    onDropdownOpen: function(e) {
                        e.hide().velocity("slideDown", {
                            begin: function() {
                                "undefined" != typeof a && e.css({
                                    "margin-top": "0"
                                })
                            },
                            duration: 200,
                            easing: easing_swiftOut
                        })
                    },
                    onDropdownClose: function(e) {
                        e.show().velocity("slideUp", {
                            complete: function() {
                                "undefined" != typeof a && e.css({
                                    "margin-top": ""
                                })
                            },
                            duration: 200,
                            easing: easing_swiftOut
                        })
                    },
                    onChange: function(a) {
                        e.attr("data-parsley-id") && e.parsley().validate()
                    }
                })
            }
        })
    },
    switches: function(e) {
        var a = e ? $(e).find("[data-switchery]"): $("[data-switchery]");
        a.length && a.each(function() {
            if (!$(this).siblings(".switchery").length) {
                var e = this, a = $(e).attr("data-switchery-size"), i = $(e).attr("data-switchery-color"), t = $(e).attr("data-switchery-secondary-color");
                new Switchery(e, {
                    color: "undefined" != typeof i ? hex2rgba(i, 50): hex2rgba("#009688", 50),
                    jackColor: "undefined" != typeof i ? hex2rgba(i, 100): hex2rgba("#009688", 100),
                    secondaryColor: "undefined" != typeof t ? hex2rgba(t, 50): "rgba(0, 0, 0,0.26)",
                    jackSecondaryColor: "undefined" != typeof t ? hex2rgba(t, 50): "#fafafa",
                    className: "switchery" + ("undefined" != typeof a ? " switchery-" + a : "")
                })
            }
        })
    },
    parsley_validation_config: function() {
        window.ParsleyConfig = {
            excluded: "input[type=button], input[type=submit], input[type=reset], input[type=hidden], input.exclude_validation",
            trigger: "change",
            errorsWrapper: '<div class="parsley-errors-list"></div>',
            errorTemplate: "<span></span>",
            errorClass: "md-input-danger",
            successClass: "md-input-success",
            errorsContainer: function(e) {
                var a = e.$element;
                return a.closest(".parsley-row")
            },
            classHandler: function(e) {
                var a = e.$element;
                if (a.is(":checkbox") || a.is(":radio") || a.parent().is("label") || $(a).is("[data-md-selectize]"))
                    return a.closest(".parsley-row")
            }
        }
    },
    parsley_extra_validators: function() {
        window.ParsleyConfig = window.ParsleyConfig || {}, window.ParsleyConfig.validators = window.ParsleyConfig.validators || {}, window.ParsleyConfig.validators.date = {
            fn: function(e) {
                var a = /^(\d{2})[.\/](\d{2})[.\/](\d{4})$/.exec(e);
                if (null == a)
                    return !1;
                var i = e.split(/[.\/-]+/), t = parseInt(i[1], 10), n = parseInt(i[0], 10), s = parseInt(i[2], 10);
                if (0 == s || 0 == n || n > 12)
                    return !1;
                var r = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                return (s%400 == 0 || s%100 != 0 && s%4 == 0) && (r[1] = 29), t > 0 && t <= r[n - 1]
            },
            priority: 256
        }
    },
    dynamic_fields: function() {
        $(".btnSectionClone").on("click", function(e) {
            e.preventDefault();
            var a = $(this), i = a.attr("data-section-clone"), t = $(i).parent().children("[data-section-added]:last").attr("data-section-added") ? parseInt($(i).parent().children("[data-section-added]:last").attr("data-section-added")) + 1: 1, n = $(i).clone();
            n.attr("data-section-added", t).removeAttr("id").find(".md-input").each(function(e) {
                var a = $(this), i = a.attr("name");
                a.val("").attr("name", i ? i + "[s_" + t + ":i_" + e + "]" : "[s_" + t + ":i_" + e + "]"), altair_md.update_input(a)
            }).end().find(".btnSectionClone").replaceWith('<a href="#" class="btnSectionRemove"><i class="material-icons md-24">&#xE872;</i></a>').end().find("[data-md-icheck]:checkbox").each(function(e) {
                var a = $(this), i = a.attr("name"), s = a.attr("id"), r = n.find('label[for="' + s + '"]'), d = i ? i + "-s" + t + ":cb" + e: "s" + t + ":cb" + e;
                newId = s ? s + "-s" + t + ":cb" + e : "s" + t + ":cb" + e, a.attr("name", d).attr("id", newId).removeAttr("style").removeAttr("checked").unwrap().next(".iCheck-helper").remove(), r.attr("for", newId)
            }).end().find(".dynamic_radio").each(function(e) {
                var a = $(this), i = e;
                a.find("[data-md-icheck]").each(function(e) {
                    var a = $(this), s = a.attr("name"), r = a.attr("id"), d = n.find('label[for="' + r + '"]'), o = s ? s + "-s" + t + ":cb" + i: "[s" + t + ":cb" + i;
                    newId = r ? r + "-s" + t + ":cb" + e : "s" + t + ":cb" + e, a.attr("name", o).attr("id", newId).attr("data-parsley-multiple", o).removeAttr("data-parsley-id").removeAttr("style").removeAttr("checked").unwrap().next(".iCheck-helper").remove(), d.attr("for", newId)
                })
            }).end().find("[data-switchery]").each(function(e) {
                var a = $(this), i = a.attr("name"), s = a.attr("id"), r = n.find('label[for="' + s + '"]'), d = i ? i + "-s" + t + ":sw" + e: "s" + t + ":sw" + e, o = s ? s + "-s" + t + ":sw" + e: "s" + t + ":sw" + e;
                a.attr("name", d).attr("id", o).removeAttr("style").removeAttr("checked").next(".switchery").remove(), r.attr("for", o)
            }).end().find("[data-md-selectize]").each(function(e) {
                var a = $(this), i = a.attr("name"), n = a.attr("id"), s = $("#" + n), r = i ? i + "-s" + t + ":sel" + e: "s" + t + ":sel" + e, d = n ? n + "-s" + t + ":sel" + e: "s" + t + ":sel" + e, o = s[0].selectize;
                if (o) {
                    o.destroy(), s.val("").next(".selectize_fix").remove();
                    var c = s.html();
                    altair_forms.select_elements(s.parent()), a.html(c).attr("name", r).attr("id", d).removeClass("selectized").next(".selectize-control").remove().end().next(".selectize_fix").remove()
                }
            }), $(i).before(n);
            var s = $(i).prev();
            s.hasClass("form_section_separator") && s.after('<hr class="form_hr">'), altair_md.checkbox_radio(s.find("[data-md-icheck]")), altair_forms.switches(s), altair_forms.select_elements(s)
        }), $("#page_content").on("click", ".btnSectionRemove", function(e) {
            e.preventDefault();
            var a = $(this);
            a.closest(".form_section").remove()
        })
    }
}, altair_main_sidebar = {
    init: function() {
        $sidebar_main.length && (lsTest() && (null !== localStorage.getItem("altair_sidebar_mini") && $body.addClass("sidebar_mini"), null !== localStorage.getItem("altair_sidebar_slim") && $body.addClass("sidebar_slim")), $body.hasClass("sidebar_mini") ? (altair_main_sidebar.mini_sidebar(), setTimeout(function() {
            $window.resize()
        }, 280)) : $body.hasClass("sidebar_slim") ? (altair_main_sidebar.slim_sidebar(), altair_helpers.custom_scrollbar($sidebar_main), altair_main_sidebar.sidebar_menu(), setTimeout(function() {
            $window.resize()
        }, 280)) : ($sidebar_main_toggle.on("click", function(e) {
            e.preventDefault(), $body.hasClass("sidebar_main_active") || $body.hasClass("sidebar_main_open") && $window.width() >= 1220 ? altair_main_sidebar.hide_sidebar() : altair_main_sidebar.show_sidebar()
        }), $document.on("click keyup", function(e) {
            $body.hasClass("sidebar_main_active") && $window.width() < 1220 && (($(e.target).closest($sidebar_main).length || $(e.target).closest($sidebar_main_toggle).length) && 27 != e.keyCode || altair_main_sidebar.hide_sidebar())
        }), altair_helpers.custom_scrollbar($sidebar_main), $body.hasClass("sidebar_main_active") && $window.width() < 1220 ? altair_page_content.hide_content_sidebar() : altair_page_content.show_content_sidebar(), altair_main_sidebar.sidebar_menu(), altair_main_sidebar.swipe_open()), altair_main_sidebar.lang_switcher())
    },
    hide_sidebar: function() {
        $body.addClass("sidebar_main_hiding").removeClass("sidebar_main_active sidebar_main_open"), $window.width() < 1220 && altair_page_content.show_content_sidebar(), setTimeout(function() {
            $body.removeClass("sidebar_main_hiding"), $window.resize()
        }, 290)
    },
    show_sidebar: function() {
        $body.addClass("sidebar_main_active"), $window.width() < 1220 && altair_page_content.hide_content_sidebar(), setTimeout(function() {
            $window.resize()
        }, 290)
    },
    sidebar_menu: function() {
        $sidebar_main.find(".menu_section > ul").find("li").each(function() {
            var e = $(this).children("ul").length;
            e && $(this).addClass("submenu_trigger")
        }), $(".submenu_trigger > a").on("click", function(e) {
            e.preventDefault();
            var a = $(this), i = a.next("ul").is(":visible") ? "slideUp": "slideDown", t = $sidebar_main.hasClass("accordion_mode");
            a.next("ul").velocity(i, {
                duration: 400,
                easing: easing_swiftOut,
                begin: function() {
                    "slideUp" == i ? $(this).closest(".submenu_trigger").removeClass("act_section") : (t && a.closest("li").siblings(".submenu_trigger").each(function() {
                        $(this).children("ul").velocity("slideUp", {
                            duration: 400,
                            easing: easing_swiftOut,
                            begin: function() {
                                $(this).closest(".submenu_trigger").removeClass("act_section")
                            }
                        })
                    }), $(this).closest(".submenu_trigger").addClass("act_section"))
                },
                complete: function() {
                    if ("slideUp" !== i) {
                        var e = $sidebar_main.find(".scroll-content").length ? $sidebar_main.find(".scroll-content"): $sidebar_main.find(".scrollbar-inner");
                        a.closest(".act_section").velocity("scroll", {
                            duration: 500,
                            easing: easing_swiftOut,
                            container: e
                        })
                    }
                }
            })
        }), $sidebar_main.find(".act_item").closest(".submenu_trigger").addClass("act_section current_section").children("a").trigger("click")
    },
    lang_switcher: function() {
        var e = $("#lang_switcher");
        e.length && (e.selectize({
            options: [{
                id: 1,
                title: "English",
                value: "gb"
            }, {
                id: 2,
                title: "French",
                value: "fr"
            }, {
                id: 3,
                title: "Chinese",
                value: "cn"
            }, {
                id: 4,
                title: "Dutch",
                value: "nl"
            }, {
                id: 5,
                title: "Italian",
                value: "it"
            }, {
                id: 6,
                title: "Spanish",
                value: "es"
            }, {
                id: 7,
                title: "German",
                value: "de"
            }, {
                id: 8,
                title: "Polish",
                value: "pl"
            }
            ],
            render: {
                option: function(e, a) {
                    return '<div class="option"><i class="item-icon flag-' + a(e.value).toUpperCase() + '"></i><span>' + a(e.title) + "</span></div>"
                },
                item: function(e, a) {
                    return '<div class="item"><i class="item-icon flag-' + a(e.value).toUpperCase() + '"></i></div>'
                }
            },
            valueField: "value",
            labelField: "title",
            searchField: "title",
            create: !1,
            hideSelected: !0,
            onDropdownOpen: function(e) {
                e.hide().velocity("slideDown", {
                    begin: function() {
                        e.css({
                            "margin-top": "-33px"
                        })
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
            },
            onDropdownClose: function(e) {
                e.show().velocity("slideUp", {
                    complete: function() {
                        e.css({
                            "margin-top": ""
                        })
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
            }
        }), e.next().children(".selectize-input").find("input").attr("readonly", !0))
    },
    swipe_open: function() {
        if ($body.hasClass("sidebar_main_swipe") && Modernizr.touch) {
            $body.append('<div id="sidebar_swipe_area" style="position: fixed;left: 0;top:0;z-index:1000;width:16px;height:100%"></div>');
            var e = document.getElementById("sidebar_swipe_area");
            mc = new Hammer.Manager(e), mc.add(new Hammer.Swipe({
                threshold: 0,
                pointers: 2,
                velocity: 0
            })), mc.on("swiperight", function() {
                $body.hasClass("sidebar_main_active") || altair_main_sidebar.show_sidebar()
            })
        }
    },
    mini_sidebar: function() {
        $sidebar_main_toggle.hide(), $sidebar_main.find(".menu_section > ul").children("li").each(function() {
            var e = $(this).children("ul").length;
            e ? ($(this).addClass("sidebar_submenu"), $(this).find(".act_item").length && $(this).addClass("current_section")) : $(this).attr({
                "data-uk-tooltip": "{pos:'right'}"
            })
        }), $body.addClass("sidebar_mini").removeClass("sidebar_main_active sidebar_main_open sidebar_main_swipe")
    },
    slim_sidebar: function() {
        $sidebar_main_toggle.hide(), $body.addClass("sidebar_slim sidebar_slim_inactive").removeClass("sidebar_main_active sidebar_main_open sidebar_main_swipe"), $sidebar_main.mouseenter(function() {
            $body.removeClass("sidebar_slim_inactive"), $body.addClass("sidebar_slim_active")
        }).mouseleave(function() {
            $body.addClass("sidebar_slim_inactive"), $body.removeClass("sidebar_slim_active")
        })
    }
}, altair_secondary_sidebar = {
    init: function() {
        $sidebar_secondary.length && ($sidebar_secondary_toggle.removeClass("sidebar_secondary_check"), $sidebar_secondary_toggle.on("click", function(e) {
            e.preventDefault(), $body.hasClass("sidebar_secondary_active") ? altair_secondary_sidebar.hide_sidebar() : altair_secondary_sidebar.show_sidebar()
        }), $document.on("click keydown", function(e) {
            !$body.hasClass("sidebar_secondary_active") || ($(e.target).closest($sidebar_secondary).length || $(e.target).closest($sidebar_secondary_toggle).length) && 27 != e.which || altair_secondary_sidebar.hide_sidebar()
        }), $body.hasClass("sidebar_secondary_active") && altair_secondary_sidebar.hide_sidebar(), altair_helpers.custom_scrollbar($sidebar_secondary), altair_secondary_sidebar.chat_sidebar())
    },
    hide_sidebar: function() {
        $body.removeClass("sidebar_secondary_active")
    },
    show_sidebar: function() {
        $body.addClass("sidebar_secondary_active")
    },
    chat_sidebar: function() {
        $sidebar_secondary.find(".md-list.chat_users").length && ($(".md-list.chat_users").children("li").on("click", function() {
            $(".md-list.chat_users").velocity("transition.slideRightBigOut", {
                duration: 280,
                easing: easing_swiftOut,
                complete: function() {
                    $sidebar_secondary.find(".chat_box_wrapper").addClass("chat_box_active").velocity("transition.slideRightBigIn", {
                        duration: 280,
                        easing: easing_swiftOut,
                        begin: function() {
                            $sidebar_secondary.addClass("chat_sidebar")
                        }
                    })
                }
            })
        }), $sidebar_secondary.find(".chat_sidebar_close").on("click", function() {
            $sidebar_secondary.find(".chat_box_wrapper").removeClass("chat_box_active").velocity("transition.slideRightBigOut", {
                duration: 280,
                easing: easing_swiftOut,
                complete: function() {
                    $sidebar_secondary.removeClass("chat_sidebar"), $(".md-list.chat_users").velocity("transition.slideRightBigIn", {
                        duration: 280,
                        easing: easing_swiftOut
                    })
                }
            })
        }), $sidebar_secondary.find(".uk-tab").length && $sidebar_secondary.find(".uk-tab").on("change.uk.tab", function(e, a, i) {
            $(a).hasClass("chat_sidebar_tab") && $sidebar_secondary.find(".chat_box_wrapper").hasClass("chat_box_active") ? $sidebar_secondary.addClass("chat_sidebar") : $sidebar_secondary.removeClass("chat_sidebar")
        }))
    }
}, altair_top_bar = {
    init: function() {
        $topBar.length && $body.addClass("top_bar_active")
    }
}, altair_page_heading = {
    init: function() {
        $pageHeading.length && $body.addClass("page_heading_active")
    }
}, altair_main_header = {
    init: function() {
        altair_main_header.search_activate(), altair_main_header.search_autocomplete()
    },
    search_activate: function() {
        $("#main_search_btn").on("click", function(e) {
            e.preventDefault(), altair_main_header.search_show()
        }), $(document).on("click keydown", function(e) {
            !$body.hasClass("main_search_persistent") && $body.hasClass("main_search_active") && (($(e.target).closest(".header_main_search_form").length || $(e.target).closest("#main_search_btn").length) && 27 != e.which || altair_main_header.search_hide())
        }), $(".header_main_search_close").on("click", function() {
            altair_main_header.search_hide()
        }), $body.hasClass("main_search_persistent") && altair_main_header.search_show()
    },
    search_show: function() {
        $header_main.children(".header_main_content").velocity("transition.slideUpBigOut", {
            duration: 280,
            easing: easing_swiftOut,
            begin: function() {
                $body.addClass("main_search_active")
            },
            complete: function() {
                $header_main.children(".header_main_search_form").velocity("transition.slideDownBigIn", {
                    duration: 280,
                    easing: easing_swiftOut,
                    complete: function() {
                        $(".header_main_search_input").focus()
                    }
                })
            }
        })
    },
    search_hide: function() {
        $header_main.children(".header_main_search_form").velocity("transition.slideUpBigOut", {
            duration: 280,
            easing: easing_swiftOut,
            begin: function() {
                $header_main.velocity("reverse"), $body.removeClass("main_search_active")
            },
            complete: function() {
                $header_main.children(".header_main_content").velocity("transition.slideDownBigIn", {
                    duration: 280,
                    easing: easing_swiftOut,
                    complete: function() {
                        $(".header_main_search_input").blur().val("")
                    }
                })
            }
        })
    },
    search_autocomplete: function() {}
}, altair_md = {
    init: function() {
        altair_md.inputs(), altair_md.checkbox_radio(), altair_md.card_fullscreen(), altair_md.card_expand(), altair_md.card_overlay(), altair_md.card_single(), altair_md.card_panel(), altair_md.card_progress(), altair_md.list_outside(), altair_md.fab_speed_dial(), altair_md.fab_toolbar(), altair_md.fab_sheet(), altair_md.wave_effect()
    },
    card_fullscreen: function() {
        $(".md-card-fullscreen-activate").on("click", function() {
            var e = $(this).closest(".md-card");
            if (!e.hasClass("md-card-fullscreen")) {
                var a = e.height(), i = $(this).hasClass("toolbar_fixed"), t = e.width(), n = $body.scrollTop(), s = e.offset();
                e.after('<div class="md-card-placeholder" style="width:' + t + "px;height:" + a + 'px;"/>'), e.addClass("md-card-fullscreen").css({
                    width: t,
                    height: a,
                    left: s.left,
                    top: s.top - n
                }).velocity({
                    left: 0,
                    top: 0
                }, {
                    duration: 400,
                    easing: easing_swiftOut,
                    begin: function(a) {
                        var i = e.find(".md-card-toolbar");
                        i.length ? i.prepend('<span class="md-icon md-card-fullscreen-deactivate material-icons uk-float-left">&#xE5C4;</span>') : e.append('<span class="md-icon md-card-fullscreen-deactivate material-icons uk-position-top-right" style="margin:10px 10px 0 0">&#xE5CD;</span>'), altair_page_content.hide_content_sidebar()
                    }
                }).velocity({
                    height: "100%",
                    width: "100%"
                }, {
                    duration: 400,
                    easing: easing_swiftOut,
                    complete: function(a) {
                        e.find(".md-card-fullscreen-content").velocity("transition.slideUpBigIn", {
                            duration: 400,
                            easing: easing_swiftOut,
                            complete: function(e) {
                                $(window).resize()
                            }
                        }), i && e.addClass("mdToolbar_fixed")
                    }
                })
            }
        }), $page_content.on("click", ".md-card-fullscreen-deactivate", function() {
            var e = $(".md-card-placeholder"), a = e.height(), i = e.width(), t = $body.scrollTop(), n = e.offset().top - t, s = e.offset().left, r = $(".md-card-fullscreen"), d = r.hasClass("mdToolbar_fixed");
            r.velocity({
                height: a,
                width: i
            }, {
                duration: 400,
                easing: easing_swiftOut,
                begin: function(e) {
                    r.find(".md-card-fullscreen-content").velocity("transition.slideDownOut", {
                        duration: 275,
                        easing: easing_swiftOut
                    }), d && r.removeClass("mdToolbar_fixed")
                },
                complete: function(e) {
                    $window.resize(), r.find(".md-card-fullscreen-deactivate").remove(), altair_page_content.show_content_sidebar()
                }
            }).velocity({
                left: s,
                top: n
            }, {
                duration: 400,
                easing: easing_swiftOut,
                complete: function(a) {
                    r.removeClass("md-card-fullscreen").css({
                        width: "",
                        height: "",
                        left: "",
                        top: ""
                    }), e.remove(), $body.removeClass("md-card-fullscreen-active")
                }
            })
        })
    },
    card_expand: function() {
        $(".md-expand").velocity("transition.expandIn", {
            stagger: 175,
            drag: !0
        }), $(".md-expand-group").children().velocity("transition.expandIn", {
            stagger: 175,
            drag: !0
        })
    },
    card_overlay: function() {
        var e = $(".md-card");
        e.each(function() {
            var e = $(this);
            e.hasClass("md-card-overlay-active") && e.find(".md-card-overlay-toggler").html("&#xE5CD;")
        }), e.on("click", ".md-card-overlay-toggler", function(e) {
            e.preventDefault(), $(this).closest(".md-card").hasClass("md-card-overlay-active") ? $(this).html("&#xE5D4;").closest(".md-card").removeClass("md-card-overlay-active") : $(this).html("&#xE5CD;").closest(".md-card").addClass("md-card-overlay-active")
        })
    },
    card_single: function() {
        function e() {
            var e = $window.height() - (2 * header__main_height + 12);
            a.find(".md-card-content").innerHeight(e)
        }
        var a = $(".md-card-single");
        a && $body.hasClass("header_double_height") && (e(), $window.on("debouncedresize", function() {
            e()
        }))
    },
    card_panel: function() {
        $(".md-card-close").on("click", function(e) {
            e.preventDefault();
            var a = $(this), i = a.closest(".md-card"), t = function() {
                $(i).remove()
            };
            altair_md.card_show_hide(i, void 0, t)
        }), $(".md-card-toggle").on("click", function(e) {
            e.preventDefault();
            var a = $(this), i = a.closest(".md-card");
            $(i).toggleClass("md-card-collapsed").children(".md-card-content").slideToggle("280", bez_easing_swiftOut), a.velocity({
                scale: 0,
                opacity: .2
            }, {
                duration: 280,
                easing: easing_swiftOut,
                complete: function() {
                    $(i).hasClass("md-card-collapsed") ? a.html("&#xE313;") : a.html("&#xE316;"), a.velocity("reverse"), $window.resize()
                }
            })
        }), $(".md-card-collapsed").each(function() {
            var e = $(this), a = e.find(".md-card-toggle");
            a.html("&#xE313;"), e.children(".md-card-content").hide()
        })
    },
    card_show_hide: function(e, a, i, t) {
        $(e).velocity({
            scale: 0,
            opacity: .2
        }, {
            duration: 400,
            easing: easing_swiftOut,
            begin: function() {
                "undefined" != typeof a && a(t)
            },
            complete: function() {
                "undefined" != typeof i && i(t)
            }
        }).velocity("reverse")
    },
    card_progress: function(e, a, i) {
        var t = e ? $(e).children(".md-card-toolbar"): $("[data-toolbar-progress]");
        t.each(function() {
            var e = $(this), t = a ? parseInt(a): parseInt(e.attr("data-toolbar-progress")), n = e.attr("data-toolbar-progress-steps");
            if (i || n)
                if (t > 66)
                    var s = "#dcedc8";
                else if (t > 33)
                    var s = "#ffecb3";
                else
                    var s = "#ffcdd2";
            else {
                var r = e.attr("data-toolbar-bg-default");
                if (r)
                    var s = r;
                else {
                    var s = e.css("backgroundColor");
                    e.attr("data-toolbar-bg-default", s)
                }
            }
            a && e.attr("data-toolbar-progress", a);
            var d = "#fff";
            e.css({
                background: "-moz-linear-gradient(left, " + s + " " + t + "%, " + d + " " + t + "%)"
            }).css({
                background: "linear-gradient(to right,  " + s + " " + t + "%, " + d + " " + t + "%)"
            }).css({
                background: "-webkit-linear-gradient(left, " + s + " " + t + "%, " + d + " " + t + "%)"
            })
        })
    },
    list_outside: function() {
        function e() {
            var e = $window.height() - (2 * header__main_height + 10);
            a.height(e)
        }
        var a = $(".md-list-outside-wrapper");
        a && $body.hasClass("header_double_height") && (e(), $window.on("debouncedresize", function() {
            e()
        }), altair_helpers.custom_scrollbar(a))
    },
    inputs: function(e) {
        var a = "undefined" == typeof e ? $(".md-input"): $(e).find(".md-input");
        a.each(function() {
            if (!$(this).closest(".md-input-wrapper").length) {
                var e = $(this), a = "";
                if (e.is('[class*="uk-form-width-"]'))
                    for (var i = e.attr("class").split(" "), t = 0; t < i.length; t++) {
                        var n = i[t].substr(0, 14);
                        if ("uk-form-width-" == n)
                            var a = i[t]
                    }
                e.prev("label").length ? e.prev("label").andSelf().wrapAll('<div class="md-input-wrapper"/>') : e.siblings("[data-uk-form-password]").length ? e.siblings("[data-uk-form-password]").andSelf().wrapAll('<div class="md-input-wrapper"/>') : e.wrap('<div class="md-input-wrapper"/>'), e.closest(".md-input-wrapper").append('<span class="md-input-bar ' + a + '"/>'), altair_md.update_input(e)
            }
            $body.on("focus", ".md-input", function() {
                $(this).closest(".md-input-wrapper").addClass("md-input-focus")
            }).on("blur", ".md-input", function() {
                $(this).closest(".md-input-wrapper").removeClass("md-input-focus"), $(this).hasClass("label-fixed") || ("" != $(this).val() ? $(this).closest(".md-input-wrapper").addClass("md-input-filled") : $(this).closest(".md-input-wrapper").removeClass("md-input-filled"))
            }).on("change", ".md-input", function() {
                altair_md.update_input($(this))
            })
        })
    },
    checkbox_radio: function(e) {
        var a = "undefined" == typeof e ? $("[data-md-icheck],.data-md-icheck"): $(e);
        a.each(function() {
            $(this).next(".iCheck-helper").length || $(this).iCheck({
                checkboxClass: "icheckbox_md",
                radioClass: "iradio_md",
                increaseArea: "20%"
            }).on("ifChanged", function(e) {
                $(this).data("parsley-multiple") && $(this).parsley().validate()
            })
        })
    },
    update_input: function(e) {
        e.closest(".uk-input-group").removeClass("uk-input-group-danger uk-input-group-success"), e.closest(".md-input-wrapper").removeClass("md-input-wrapper-danger md-input-wrapper-success md-input-wrapper-disabled"), e.hasClass("md-input-danger") && (e.closest(".uk-input-group").length && e.closest(".uk-input-group").addClass("uk-input-group-danger"), e.closest(".md-input-wrapper").addClass("md-input-wrapper-danger")), e.hasClass("md-input-success") && (e.closest(".uk-input-group").length && e.closest(".uk-input-group").addClass("uk-input-group-success"), e.closest(".md-input-wrapper").addClass("md-input-wrapper-success")), e.prop("disabled") && e.closest(".md-input-wrapper").addClass("md-input-wrapper-disabled"), "" != e.val() ? e.closest(".md-input-wrapper").addClass("md-input-filled") : e.closest(".md-input-wrapper").removeClass("md-input-filled"), e.hasClass("label-fixed") && e.closest(".md-input-wrapper").addClass("md-input-filled")
    },
    fab_speed_dial: function() {
        function e(e) {
            var a = $(e), i = a.closest(".md-fab-wrapper");
            i.toggleClass("md-fab-active"), a.velocity({
                scale: 0
            }, {
                duration: 140,
                easing: easing_swiftOut,
                complete: function() {
                    a.velocity({
                        scale: 1
                    }, {
                        duration: 140,
                        easing: easing_swiftOut
                    }).children().toggle()
                }
            })
        }
        $(".md-fab-speed-dial,.md-fab-speed-dial-horizontal").children(".md-fab").append('<i class="material-icons md-fab-action-close" style="display:none">&#xE5CD;</i>').on("click", function() {
            e(this)
        }).closest(".md-fab-wrapper").find(".md-fab-small").on("click", function() {
            e($(this).closest(".md-fab-wrapper").children(".md-fab"))
        })
    },
    fab_toolbar: function() {
        var e = $(".md-fab-toolbar");
        e && (e.children("i").on("click", function(a) {
            a.preventDefault();
            var i = e.children(".md-fab-toolbar-actions").children().length;
            e.addClass("md-fab-animated");
            var t = e.hasClass("md-fab-small") ? 24: 16, n = e.hasClass("md-fab-small") ? 44: 64;
            setTimeout(function() {
                e.width(i * n + t)
            }, 140), setTimeout(function() {
                e.addClass("md-fab-active")
            }, 420)
        }), $document.on("click scroll", function(a) {
            e.hasClass("md-fab-active") && ($(a.target).closest(e).length || (e.css("width", "").removeClass("md-fab-active"), setTimeout(function() {
                e.removeClass("md-fab-animated")
            }, 140)))
        }))
    },
    fab_sheet: function() {
        var e = $(".md-fab-sheet");
        e && (e.children("i").on("click", function(a) {
            a.preventDefault();
            var i = e.children(".md-fab-sheet-actions").children("a").length;
            e.addClass("md-fab-animated"), setTimeout(function() {
                e.width("240px").height(40 * i + 8)
            }, 140), setTimeout(function() {
                e.addClass("md-fab-active")
            }, 280)
        }), $document.on("click scroll", function(a) {
            e.hasClass("md-fab-active") && ($(a.target).closest(e).length || (e.css({
                height: "",
                width: ""
            }).removeClass("md-fab-active"), setTimeout(function() {
                e.removeClass("md-fab-animated")
            }, 140)))
        }))
    },
    wave_effect: function() {
        $html.hasClass("lte-ie9") || (Waves.attach(".md-btn-wave,.md-fab-wave", ["waves-button"]), Waves.attach(".md-btn-wave-light,.md-fab-wave-light", ["waves-button", "waves-light"]), Waves.attach(".wave-box", ["waves-float"]), Waves.init({
            delay: 300
        }))
    }
}, altair_helpers = {
    truncate_text: function(e) {
        e.each(function() {
            $(this).dotdotdot({
                watch: "window"
            })
        })
    },
    custom_scrollbar: function(e) {
        e.children(".scrollbar-inner").length || e.wrapInner("<div class='scrollbar-inner'></div>"), Modernizr.touch ? e.children(".scrollbar-inner").addClass("touchscroll") : e.children(".scrollbar-inner").scrollbar({
            disableBodyScroll: !0,
            scrollx: !1,
            duration: 100
        })
    },
    hierarchical_show: function() {
        var e = $(".hierarchical_show");
        e.length && e.each(function() {
            var e = $(this), a = e.children().length, i = 100;
            e.children().each(function(e) {
                $(this).css({
                    "-webkit-animation-delay": e * i + "ms",
                    "animation-delay": e * i + "ms"
                })
            }).end().waypoint({
                handler: function() {
                    e.addClass("hierarchical_show_inView"), setTimeout(function() {
                        e.removeClass("hierarchical_show hierarchical_show_inView fast_animation").children().css({
                            "-webkit-animation-delay": "",
                            "animation-delay": ""
                        })
                    }, a * i + 1200), this.destroy()
                },
                context: "window",
                offset: "90%"
            })
        })
    },
    hierarchical_slide: function() {
        var e = $(".hierarchical_slide");
        e.length && e.each(function() {
            var e = $(this), a = e.attr("data-slide-children") ? e.children(e.attr("data-slide-children")): e.children(), i = a.length, t = e.attr("data-slide-context") ? e.closest(e.attr("data-slide-context"))[0]: "window", n = 100;
            i >= 1 && (a.each(function(e) {
                $(this).css({
                    "-webkit-animation-delay": e * n + "ms",
                    "animation-delay": e * n + "ms"
                })
            }), e.waypoint({
                handler: function() {
                    e.addClass("hierarchical_slide_inView"), setTimeout(function() {
                        e.removeClass("hierarchical_slide hierarchical_slide_inView"), a.css({
                            "-webkit-animation-delay": "",
                            "animation-delay": ""
                        })
                    }, i * n + 1200), this.destroy()
                },
                context: t,
                offset: "90%"
            }))
        })
    },
    content_preloader_show: function(e, a) {
        if (!$body.find(".content-preloader").length) {
            var i = isHighDensity() ? "@2x": "", t = "undefined" != typeof e && "regular" == e ? '<img src="assets/img/spinners/spinner' + i + '.gif" alt="" width="32" height="32">': '<div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="8"/></svg></div>', n = "undefined" != typeof a ? a: $body;
            n.append('<div class="content-preloader">' + t + "</div>"), setTimeout(function() {
                $(".content-preloader").addClass("preloader-active")
            }, 0)
        }
    },
    content_preloader_hide: function() {
        $body.find(".content-preloader").length && ($(".content-preloader").removeClass("preloader-active"), preloader_timeout = window.setTimeout(function() {
            $(".content-preloader").remove()
        }, 500))
    },
    color_picker: function(e, a) {
        if (e) {
            for (var i = randID_generator(), t = a ? a : ["#e53935", "#d81b60", "#8e24aa", "#5e35b1", "#3949ab", "#1e88e5", "#039be5", "#0097a7", "#00897b", "#43a047", "#689f38", "#ef6c00", "#f4511e", "#6d4c41", "#757575", "#546e7a"], n = t.length, s = $('<div class="cp_altair" id="' + i + '"/>'), r = 0; r < n; r++)
                s.append("<span data-color=" + t[r] + ' style="background:' + t[r] + '"></span>');
            return s.append('<input type="hidden">'), $body.on("click", "#" + i + " span", function() {
                $(this).addClass("active_color").siblings().removeClass("active_color").end().closest(".cp_altair").find("input").val($(this).attr("data-color"))
            }), e.append(s)
        }
    },
    retina_images: function() {
        "undefined" != typeof $.fn.dense && $("img").dense({
            glue: "@"
        })
    },
    full_screen: function() {
        $("#full_screen_toggle").on("click", function(e) {
            e.preventDefault(), screenfull.toggle(), $window.resize()
        })
    },
    table_check: function() {
        $table_check = $(".table_check"), $table_check.each(function() {
            var e = $(this), a = e.find(".check_all"), i = e.find(".check_row");
            a.on("ifChecked", function() {
                i.iCheck("check")
            }).on("ifUnchecked", function() {
                i.iCheck("uncheck")
            }), i.on("ifChecked", function(e) {
                $(e.currentTarget).closest("tr").addClass("row_checked")
            }).on("ifUnchecked", function(e) {
                $(e.currentTarget).closest("tr").removeClass("row_checked")
            })
        })
    },
    ie_fix: function() {
        detectIE() && ($("svg,canvas,video").each(function() {
            $(this).css("height", 0)
        }), setTimeout(function() {
            $("svg,canvas,video").each(function() {
                var e = $(this), a = $(this).attr("height"), i = $(this).attr("width");
                a && e.css("height", a), i && e.css("width", i);
                var t = e.prev(".peity_data");
                t.length && t.peity().change()
            })
        }, 1e3))
    }
}, altair_uikit = {
    reinitialize_grid_margin: function() {
        $("[data-uk-grid-margin]").each(function() {
            var e = $(this);
            e.data("gridMargin") || $.UIkit.gridMargin(e, $.UIkit.Utils.options(e.attr("data-uk-grid-margin")))
        }), $window.resize()
    }
};
