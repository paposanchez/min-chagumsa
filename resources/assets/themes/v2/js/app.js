$(document).ready(function () {
        $('body').on('click', '[data-ma-action]', function (e) {
                e.preventDefault();

                var $this = $(this);
                var action = $(this).data('ma-action');

                switch (action) {

                        /*-------------------------------------------
                        Sidebar & Chat Open/Close
                        ---------------------------------------------*/
                        case 'sidebar-open':
                        var target = $this.data('ma-target');
                        var backdrop = '<div data-ma-action="sidebar-close" class="ma-backdrop" />';

                        $('body').addClass('sidebar-toggled');
                        $('#header, #header-alt, #main').append(backdrop);
                        $this.addClass('toggled');
                        $(target).addClass('toggled');

                        break;

                        case 'sidebar-close':
                        $('body').removeClass('sidebar-toggled');
                        $('.ma-backdrop').remove();
                        $('.sidebar, .ma-trigger').removeClass('toggled')

                        break;


                        /*-------------------------------------------
                        Profile Menu Toggle
                        ---------------------------------------------*/
                        case 'profile-menu-toggle':
                        $this.parent().toggleClass('toggled');
                        $this.next().slideToggle(200);

                        break;


                        /*-------------------------------------------
                        Mainmenu Submenu Toggle
                        ---------------------------------------------*/
                        case 'submenu-toggle':
                        $this.next().slideToggle(200);
                        $this.parent().toggleClass('toggled');

                        break;


                        /*-------------------------------------------
                        Top Search Open/Close
                        ---------------------------------------------*/
                        //Open
                        case 'search-open':
                        $('#header').addClass('search-toggled');
                        $('#top-search-wrap input').focus();

                        break;

                        //Close
                        case 'search-close':
                        $('#header').removeClass('search-toggled');

                        break;


                        /*-------------------------------------------
                        Header Notification Clear
                        ---------------------------------------------*/
                        case 'clear-notification':
                        var x = $this.closest('.list-group');
                        var y = x.find('.list-group-item');
                        var z = y.size();

                        $this.parent().fadeOut();

                        x.find('.list-group').prepend('<i class="grid-loading hide-it"></i>');
                        x.find('.grid-loading').fadeIn(1500);


                        var w = 0;
                        y.each(function(){
                                var z = $(this);
                                setTimeout(function(){
                                        z.addClass('animated fadeOutRightBig').delay(1000).queue(function(){
                                                z.remove();
                                        });
                                }, w+=150);
                        })

                        //Popup empty message
                        setTimeout(function(){
                                $('.him-notification').addClass('empty');
                        }, (z*150)+200);

                        break;


                        /*-------------------------------------------
                        Fullscreen Browsing
                        ---------------------------------------------*/
                        case 'fullscreen':
                        //Launch
                        function launchIntoFullscreen(element) {
                                if(element.requestFullscreen) {
                                        element.requestFullscreen();
                                } else if(element.mozRequestFullScreen) {
                                        element.mozRequestFullScreen();
                                } else if(element.webkitRequestFullscreen) {
                                        element.webkitRequestFullscreen();
                                } else if(element.msRequestFullscreen) {
                                        element.msRequestFullscreen();
                                }
                        }

                        //Exit
                        function exitFullscreen() {

                                if(document.exitFullscreen) {
                                        document.exitFullscreen();
                                } else if(document.mozCancelFullScreen) {
                                        document.mozCancelFullScreen();
                                } else if(document.webkitExitFullscreen) {
                                        document.webkitExitFullscreen();
                                }
                        }

                        launchIntoFullscreen(document.documentElement);

                        break;


                        /*-------------------------------------------
                        Clear Local Storage
                        ---------------------------------------------*/
                        case 'clear-localstorage':
                        swal({
                                title: "Are you sure?",
                                text: "All your saved localStorage values will be removed",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Yes, delete it!",
                        }).then(function(){
                                localStorage.clear();
                                swal("Done!", "localStorage is cleared", "success");
                        });

                        break;


                        /*-------------------------------------------
                        Print
                        ---------------------------------------------*/
                        case 'print':

                        window.print();

                        break;


                        /*-------------------------------------------
                        Login Window Switch
                        ---------------------------------------------*/
                        case 'login-switch':
                        var loginblock = $this.data('ma-block');
                        var loginParent = $this.closest('.lc-block');

                        loginParent.removeClass('toggled');

                        setTimeout(function(){
                                $(loginblock).addClass('toggled');
                        });

                        break;


                        /*-------------------------------------------
                        Profile Edit/Edit Cancel
                        ---------------------------------------------*/
                        //Edit
                        case 'profile-edit':
                        $this.closest('.pmb-block').toggleClass('toggled');

                        break;

                        case 'profile-edit-cancel':
                        $(this).closest('.pmb-block').removeClass('toggled');

                        break;


                        /*-------------------------------------------
                        Action Header Open/Close
                        ---------------------------------------------*/
                        //Open
                        case 'action-header-open':
                        ahParent = $this.closest('.action-header').find('.ah-search');

                        ahParent.fadeIn(300);
                        ahParent.find('.ahs-input').focus();

                        break;

                        //Close
                        case 'action-header-close':
                        ahParent.fadeOut(300);
                        setTimeout(function(){
                                ahParent.find('.ahs-input').val('');
                        }, 350);

                        break;


                        /*-------------------------------------------
                        Wall Comment Open/Close
                        ---------------------------------------------*/
                        //Open
                        case 'wall-comment-open':
                        if(!($this).closest('.wic-form').hasClass('toggled')) {
                                $this.closest('.wic-form').addClass('toggled');
                        }

                        break;

                        //Close
                        case 'wall-comment-close':
                        $this.closest('.wic-form').find('textarea').val('');
                        $this.closest('.wic-form').removeClass('toggled');

                        break;


                        /*-------------------------------------------
                        Todo Form Open/Close
                        ---------------------------------------------*/
                        //Open
                        case 'todo-form-open':
                        $this.closest('.t-add').addClass('toggled');

                        break;

                        //Close
                        case 'todo-form-close':
                        $this.closest('.t-add').removeClass('toggled');
                        $this.closest('.t-add').find('textarea').val('');

                        break;


                        /*-------------------------------------------
                        Change Header Skin
                        ---------------------------------------------*/
                        case 'change-skin':

                        var skin = $this.data('ma-skin');
                        $('[data-ma-theme]').attr('data-ma-theme', skin);

                        break;
                }
        });
});

$(window).load(function(){

        /*-------------------------------------------
        Welcome Message
        ---------------------------------------------*/
        function notify(message, type){
                $.growl({
                        message: message
                },{
                        type: type,
                        allow_dismiss: false,
                        label: 'Cancel',
                        className: 'btn-xs btn-inverse',
                        placement: {
                                from: 'bottom',
                                align: 'left'
                        },
                        delay: 2500,
                        animate: {
                                enter: 'animated fadeInUp',
                                exit: 'animated fadeOutDown'
                        },
                        offset: {
                                x: 30,
                                y: 30
                        }
                });
        };

        setTimeout(function () {
                if (!$('.login-content')[0]) {
                        notify('Welcome back Mallinda Hollaway', 'inverse');
                }
        }, 1000)
});

/*----------------------------------------------------------
Detect Mobile Browser
-----------------------------------------------------------*/
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('html').addClass('ismobile');
}

$(window).load(function () {
        /*----------------------------------------------------------
        Page Loader
        -----------------------------------------------------------*/
        if(!$('html').hasClass('ismobile')) {
                if($('.page-loader')[0]) {
                        setTimeout (function () {
                                $('.page-loader').fadeOut();
                        }, 500);

                }
        }
})

$(document).ready(function(){

        /*----------------------------------------------------------
        Scrollbar
        -----------------------------------------------------------*/
        function scrollBar(selector, theme, mousewheelaxis) {
                $(selector).mCustomScrollbar({
                        theme: theme,
                        scrollInertia: 100,
                        axis:'yx',
                        mouseWheel: {
                                enable: true,
                                axis: mousewheelaxis,
                                preventDefault: true
                        }
                });
        }

        if (!$('html').hasClass('ismobile')) {
                //On Custom Class
                if ($('.c-overflow')[0]) {
                        scrollBar('.c-overflow', 'minimal-dark', 'y');
                }
        }


        /*----------------------------------------------------------
        Dropdown Menu
        -----------------------------------------------------------*/
        if($('.dropdown')[0]) {
                //Propagate
                $('body').on('click', '.dropdown.open .dropdown-menu', function(e){
                        e.stopPropagation();
                });

                $('.dropdown').on('shown.bs.dropdown', function (e) {
                        if($(this).attr('data-animation')) {
                                $animArray = [];
                                $animation = $(this).data('animation');
                                $animArray = $animation.split(',');
                                $animationIn = 'animated '+$animArray[0];
                                $animationOut = 'animated '+ $animArray[1];
                                $animationDuration = ''
                                if(!$animArray[2]) {
                                        $animationDuration = 500; //if duration is not defined, default is set to 500ms
                                }
                                else {
                                        $animationDuration = $animArray[2];
                                }

                                $(this).find('.dropdown-menu').removeClass($animationOut)
                                $(this).find('.dropdown-menu').addClass($animationIn);
                        }
                });

                $('.dropdown').on('hide.bs.dropdown', function (e) {
                        if($(this).attr('data-animation')) {
                                e.preventDefault();
                                $this = $(this);
                                $dropdownMenu = $this.find('.dropdown-menu');

                                $dropdownMenu.addClass($animationOut);
                                setTimeout(function(){
                                        $this.removeClass('open')

                                }, $animationDuration);
                        }
                });
        }




        /*----------------------------------------------------------
        Auto Size Textare
        -----------------------------------------------------------*/
        if ($('.auto-size')[0]) {
                autosize($('.auto-size'));
        }


        /*----------------------------------------------------------
        Text Field
        -----------------------------------------------------------*/
        //Add blue animated border and remove with condition when focus and blur
        if($('.fg-line')[0]) {
                $('body').on('focus', '.fg-line .form-control', function(){
                        $(this).closest('.fg-line').addClass('fg-toggled');
                })

                $('body').on('blur', '.form-control', function(){
                        var p = $(this).closest('.form-group, .input-group');
                        var i = p.find('.form-control').val();

                        if (p.hasClass('fg-float')) {
                                if (i.length == 0) {
                                        $(this).closest('.fg-line').removeClass('fg-toggled');
                                }
                        }
                        else {
                                $(this).closest('.fg-line').removeClass('fg-toggled');
                        }
                });
        }

        //Add blue border for pre-valued fg-flot text feilds
        if($('.fg-float')[0]) {
                $('.fg-float .form-control').each(function(){
                        var i = $(this).val();

                        if (!i.length == 0) {
                                $(this).closest('.fg-line').addClass('fg-toggled');
                        }

                });
        }


        /*----------------------------------------------------------
        Audio and Video Player
        -----------------------------------------------------------*/
        if($('audio, video')[0]) {
                $('video,audio').mediaelementplayer();
        }


        /*----------------------------------------------------------
        Chosen
        -----------------------------------------------------------*/
        if($('.chosen')[0]) {
                $('.chosen').chosen({
                        width: '100%',
                        allow_single_deselect: true
                });
        }


        /*-----------------------------------------------------------
        Summernote HTML Editor
        -----------------------------------------------------------*/
        if ($('.html-editor')[0]) {
                $('.html-editor').summernote({
                        height: 150
                });
        }

        if($('.html-editor-click')[0]) {
                //Edit
                $('body').on('click', '.hec-button', function(){
                        $('.html-editor-click').summernote({
                                focus: true
                        });
                        $('.hec-save').show();
                })

                //Save
                $('body').on('click', '.hec-save', function(){
                        $('.html-editor-click').code();
                        $('.html-editor-click').destroy();
                        $('.hec-save').hide();
                        notify('Content Saved Successfully!', 'success');
                });
        }

        //Air Mode
        if($('.html-editor-airmod')[0]) {
                $('.html-editor-airmod').summernote({
                        airMode: true
                });
        }


        /*-----------------------------------------------------------
        Date Time Picker
        -----------------------------------------------------------*/
        //Date Time Picker
        if ($('.date-time-picker')[0]) {
                $('.date-time-picker').datetimepicker();
        }

        //Time
        if ($('.time-picker')[0]) {
                $('.time-picker').datetimepicker({
                        format: 'LT'
                });
        }

        //Date
        if ($('.date-picker')[0]) {
                $('.date-picker').datetimepicker({
                        format: 'DD/MM/YYYY'
                });
        }

        $('.date-picker').on('dp.hide', function(){
                $(this).closest('.dtp-container').removeClass('fg-toggled');
                $(this).blur();
        })



        /*-----------------------------------------------------------
        Waves
        -----------------------------------------------------------*/
        (function(){
                Waves.attach('.btn:not(.btn-icon):not(.btn-float)');
                Waves.attach('.btn-icon, .btn-float', ['waves-circle', 'waves-float']);
                Waves.init();
        })();


        /*----------------------------------------------------------
        Lightbox
        -----------------------------------------------------------*/
        if ($('.lightbox')[0]) {
                $('.lightbox').lightGallery({
                        enableTouch: true
                });
        }


        /*-----------------------------------------------------------
        Link prevent
        -----------------------------------------------------------*/
        $('body').on('click', '.a-prevent', function(e){
                e.preventDefault();
        });


        /*----------------------------------------------------------
        Bootstrap Accordion Fix
        -----------------------------------------------------------*/
        if ($('.collapse')[0]) {

                //Add active class for opened items
                $('.collapse').on('show.bs.collapse', function (e) {
                        $(this).closest('.panel').find('.panel-heading').addClass('active');
                });

                $('.collapse').on('hide.bs.collapse', function (e) {
                        $(this).closest('.panel').find('.panel-heading').removeClass('active');
                });

                //Add active class for pre opened items
                $('.collapse.in').each(function(){
                        $(this).closest('.panel').find('.panel-heading').addClass('active');
                });
        }


        /*-----------------------------------------------------------
        Tooltips
        -----------------------------------------------------------*/
        if ($('[data-toggle="tooltip"]')[0]) {
                $('[data-toggle="tooltip"]').tooltip();
        }


        /*-----------------------------------------------------------
        Popover
        -----------------------------------------------------------*/
        if ($('[data-toggle="popover"]')[0]) {
                $('[data-toggle="popover"]').popover();
        }


        /*-----------------------------------------------------------
        IE 9 Placeholder
        -----------------------------------------------------------*/
        if($('html').hasClass('ie9')) {
                $('input, textarea').placeholder({
                        customClass: 'ie9-placeholder'
                });
        }


        /*-----------------------------------------------------------
        Typeahead Auto Complete
        -----------------------------------------------------------*/
        // if($('.typeahead')[0]) {
        //
        //         var statesArray = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
        //         'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
        //         'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
        //         'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
        //         'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
        //         'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
        //         'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
        //         'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
        //         'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        // ];
        //
        // var states = new Bloodhound({
        //         datumTokenizer: Bloodhound.tokenizers.whitespace,
        //         queryTokenizer: Bloodhound.tokenizers.whitespace,
        //         local: statesArray
        // });
        //
        // $('.typeahead').typeahead({
        //         hint: true,
        //         highlight: true,
        //         minLength: 1
        // },
        // {
        //         name: 'states',
        //         source: states
        // });
}


});

if ($('.alert-autoclose').length > 0) {
        $('.alert-autoclose').each(function () {
                var $alert = $(this);
                $alert.fadeTo(5000, 500).slideUp(500, function (e) {
                        $alert.alert('close');
                });
        });
}
