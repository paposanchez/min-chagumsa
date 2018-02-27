<!doctype html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->
<html lang="ko">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if($report_type == 'D')
            차검사 진단서
        @elseif($report_type == 'C')
            차검사 평가서
        @else
            차검사 보증서
        @endif
    </title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">


    <link href="../../assets/css/pure-min.css" rel="stylesheet">

    <!--[if lte IE 8]>
    <link href="../../assets/css/grids-responsive-old-ie-min.css" rel="stylesheet">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link href="../../assets/css/grids-responsive-min.css" rel="stylesheet">
    <!--<![endif]-->

{{--<link href="../../assets/css/theme.css" rel="stylesheet">--}}




<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
    </script>

{{ Html::script(mix( '/assets/js/base.js' ), array(), env('APP_SECURE', 'true')) }}

<!-- Styles -->
    @yield('content-header-script')
    {!! Html::style(mix('/assets/css/app.css'), array(), env('APP_SECURE', 'true')) !!}


</head>

<body class="@yield( 'body-class' )" @yield( 'body-attr' )>
<!-- header -->
@include("partials.document-header", ['data' => $data, 'report_type' => $report_type])


<!-- 본문 -->
<div class="body ">

    <div class="container">
        @include("partials.document-information", ['data' => $data, 'report_type' => $report_type])

        @if($report_type == 'D')
            @include("partials.document-diagnosis", ['data' => $data, 'report_type' => $report_type])
        @elseif($report_type == 'C')
            @include("partials.document-certificate", ['data' => $data, 'report_type' => $report_type])
        @else
            @include("partials.document-warranty", ['data' => $data, 'report_type' => $report_type])
        @endif
    </div>

    @include("partials.document-etc", ['data' => $data, 'report_type' => $report_type])

    @include("partials.document-detail", ['data' => $data, 'report_type' => $report_type])
</div>



<!-- footer -->
@include("partials.document-footer", ['data' => $data, 'report_type' => $report_type])

{{-- tracking script --}}
@if( config('app.analytics'))
    <script type="text/javascript">
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', "{{ config('app.analytics') }}", 'auto');
        ga('send', 'pageview');
    </script>
@endif

</body>

</html>
