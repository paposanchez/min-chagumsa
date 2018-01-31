{{-- LAYOUT --}}
@extends( 'layouts.base' )

@section( 'body-title', config("app.name") )

@section('body-class') layout-wide  @endsection

@section( 'content-header-script' )


        <!-- Vendor CSS -->
        {!! Html::style('/assets/vendors/bower_components/animate.css/animate.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/sweetalert2/dist/sweetalert2.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/summernote/dist/summernote.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/chosen/chosen.css', array(), true) !!}
        {!! Html::style('/assets/vendors/farbtastic/farbtastic.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/dropzone/dist/min/dropzone.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/nouislider/distribute/nouislider.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css', array(), true) !!}
        {!! Html::style('/assets/vendors/bower_components/sweetalert2/dist/sweetalert2.min.css', array(), true) !!}

        @stack('header-script')

@endsection

@section( 'content-header' )
        @include('flash::message')
@endsection

@section( 'content-body' )

                @yield( 'content' )

@endsection

@section( 'content-footer' )
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->
@endsection



@section( 'content-footer-script' )


        <!-- Javascript Libraries -->
        {!! Html::script('/assets/vendors/bower_components/flot/jquery.flot.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/flot/jquery.flot.resize.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/flot.curvedlines/curvedLines.js', array(), true) !!}
        {!! Html::script('/assets/vendors/sparklines/jquery.sparkline.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/moment/min/moment.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js', array(), true) !!}

        {!! Html::script('/assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/Waves/dist/waves.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bootstrap-growl/bootstrap-growl.min.js, array(), true') !!}
        {!! Html::script('/assets/vendors/bower_components/sweetalert2/dist/sweetalert2.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/nouislider/distribute/nouislider.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/dropzone/dist/min/dropzone.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/summernote/dist/summernote-updated.min.js', array(), true) !!}

        {!! Html::script('/assets/vendors/bower_components/chosen/chosen.jquery.js', array(), true) !!}
        {!! Html::script('/assets/vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/fileinput/fileinput.min.js', array(), true) !!}
        {!! Html::script('/assets/vendors/farbtastic/farbtastic.min.js', array(), true) !!}


        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
        {!! Html::script('/assets/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js', array(), true) !!}
        <![endif]-->


        {{-- application script --}}
        {{ Html::script(mix( '/assets/js/app.admin.js', array(), true )) }}

        @stack( 'footer-script' )

@endsection
