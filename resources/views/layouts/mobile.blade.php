<!doctype html>
<html lang="ko">
<head>
    <meta charset='utf-8'/>
    <meta name='keywords' content='차검사'>
    <meta name='description' content='차검사'>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="format-detection" content="telephone=no">
    <meta name='viewport' content="width=device-width, initial-scale=1">
    <title>차검사</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!};
    </script>

    {{ Html::script(Helper::assets( 'js/app.js' )) }}

    @yield('content-header-script')
</head>
<body class="@yield( 'body-class' )" @yield( 'body-attr' )>

<div id='document'>
    @yield('content-header')

    @yield('content-body')

    @yield('content-footer')

</div>

@yield('footer-script')
</body>

</html>