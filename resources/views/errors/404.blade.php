@extends( 'layouts.error' )

@section( 'content' )

<div class="four-zero">
    <div class="fz-block">
        <h2>404</h2>
        <small>요청하신 페이지를 찾을 수 없습니다. 주소를 확인하시기 바랍니다.</small>

        <div class="fzb-links">
            <a href="index.html"><i class="zmdi zmdi-arrow-back"></i></a>
            <a href="index.html"><i class="zmdi zmdi-home"></i></a>
        </div>
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


@push( 'header-script' )
        {!! Html::style('/assets/vendors/bower_components/animate.css/animate.min.css') !!}
        {!! Html::style('/assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') !!}
@endpush
