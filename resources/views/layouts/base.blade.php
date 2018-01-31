<!doctype html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<html lang="ko">
<head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        {!! Html::style(mix('/assets/css/app.css'), array(), true) !!}


        <!-- Scripts -->
        <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
        </script>

        {{ Html::script(mix( '/assets/js/base.js' ), array(), true) }}

        @yield('content-header-script')

</head>

<body class="@yield( 'body-class' )" @yield( 'body-attr' )>

        @yield('content-header')

        @yield('content-body')

        @yield('content-footer')

        @yield('content-footer-script')

        {{-- tracking script --}}
        @if( config('app.analytics'))
        <script type="text/javascript" >
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
