+function ($) {
    "use strict";

    var Rowlink = function (element, options) {
        this.$element = $(element)
        this.options = $.extend({}, Rowlink.DEFAULTS, options)

        this.$element.on('click.bs.rowlink', 'td:not(.rowlink-skip)', $.proxy(this.click, this))
    }

    Rowlink.DEFAULTS = {
        target: "a"
    }

    Rowlink.prototype.click = function (e) {
        var target = $(e.currentTarget).closest('tr').find(this.options.target)[0]
        if ($(e.target)[0] === target)
            return

        e.preventDefault();

        if (target.click) {
            target.click()
        } else if (document.createEvent) {
            var evt = document.createEvent("MouseEvents");
            evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            target.dispatchEvent(evt);
        }
    }


    // ROWLINK PLUGIN DEFINITION
    // ===========================

    var old = $.fn.rowlink

    $.fn.rowlink = function (options) {
        return this.each(function () {
            var $this = $(this)
            var data = $this.data('bs.rowlink')
            if (!data)
                $this.data('bs.rowlink', (data = new Rowlink(this, options)))
        })
    }

    $.fn.rowlink.Constructor = Rowlink


    // ROWLINK NO CONFLICT
    // ====================

    $.fn.rowlink.noConflict = function () {
        $.fn.rowlink = old
        return this
    }


    // ROWLINK DATA-API
    // ==================

    $(document).on('click.bs.rowlink.data-api', '[data-link="row"]', function (e) {
        if ($(e.target).closest('.rowlink-skip').length !== 0)
            return

        var $this = $(this)
        if ($this.data('bs.rowlink'))
            return
        $this.rowlink($this.data())
        $(e.target).trigger('click.bs.rowlink')
    })

}(window.jQuery);


$.extend({
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
    }
});
