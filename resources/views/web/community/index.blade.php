@extends( 'web.layouts.default' )

@section( 'content' )
<div class="block block-flex block-flex-middle block-flex-center block-homescreen" style="background-image: url({{ Helper::assets('img/background-extra.jpg') }});">
    <div class="text-center block-text">
        <h1 class="text-lighter"><strong class="">ZLARA</strong> 커뮤니티 페이지</h1>
    </div>
</div>

<div class="container margin-vertical">

    <div class="row">

        <div class="col-md-4">
            자유게시판
        </div>

        <div class="col-md-4">
            FAQ
        </div>

        <div class="col-md-4">
            공지사항
        </div>

    </div>

</div>
@endsection
