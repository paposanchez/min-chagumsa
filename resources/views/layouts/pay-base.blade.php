<!doctype html>
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
        {!! Html::style(mix('/assets/css/app.css'), array(), env('APP_SECURE', 'true')) !!}
        {{ Html::style(mix('/assets/css/vendor.css'), array(), env('APP_SECURE', 'true')) }}
        

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('content-header-script')

    </head>

    <body class="@yield( 'body-class' )" @yield( 'body-attr' )>
          
        <div id='document'>
        
            @yield('content-header')

            @yield('content-body')

            @yield('content-footer')

        </div>

        @yield('content-footer-script')
    </body>

</html>
