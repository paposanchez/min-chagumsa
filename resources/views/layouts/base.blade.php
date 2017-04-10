<!doctype html>
<html lang="ko">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <meta property="og:url"                content="{{ URL::to('/') }}{{ isset($share) ? $share->url : '' }}" />
        <meta property="og:type"               content="" />
        <meta property="og:title"              content="{{ isset($share) ? $share->title : '' }}" />
        <meta property="og:description"        content="{{ isset($share) ? $share->description : '' }}" />
        <meta property="og:image"              content="{{ isset($share) ? $share->image : '' }}" /> -->

        <title>@yield( 'body-title' )</title>
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>-->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="{{ mix( '/assets/css/app.css' ) }}"/>
        <link rel="stylesheet" href="{{ mix( '/assets/css/vendor.css' ) }}"/>

        <script type="text/javascript" src="{{ mix( '/assets/js/app.js' ) }}"></script>

        @yield('content-header-script')

    </head>

    <body class="@yield( 'body-class' )" @yield( 'body-attr' )>

          @yield('content-header')

          @yield('content-body')

          @yield('content-footer')

          <!-- overlay -->
          <div id="zfp-overlay"></div>

        @yield('content-footer-script')
    </body>

</html>
