@extends( 'web.layouts.default' )

@section( 'content' )
    <div class="block block-flex block-flex-middle block-flex-center block-homescreen"
         style="background-image: url({{ Helper::assets('img/background-gray.jpg') }});">
        <div class="text-center block-text text-white">
            <h1 class="text-lighter"><strong class="">ZLARA</strong> 마이 페이지</h1>
        </div>
    </div>

    <div class="container">

        <div class="col-md-3 hidden-sm hidden-xs">
            @include( 'web.partials.submenu.mypage' )
        </div>

        <div class="col-md-9">

        </div>
        {{$user[0]}}
    </div>
@endsection
