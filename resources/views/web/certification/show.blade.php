@extends( 'web.layouts.default' )

@section( 'content' )
<section class="block bg-primary dark">
        <div class="container container-center">
                <div class="text-center padding-vertical-large">
                        <h1 class="text-lighter">인증서조회 / <span class="">조회결과</span></h1>
                        <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
        </div>
</section>
<div class="container">

        <div class="row">

                <div class="col-md-12">

                        <h3>검색하신 인증번호에 대한 차량인증정보는 다음과 같습니다.</h3>
                        <p>가장 최근에 발급된 인증서 이외의 정보는 <a href="">인증서 이력조회</a>로 조회하세요.</p>
                        <hr>

                        <p class="">
                                <h2 class="pull-left">인증번호 : {{ $certification_id }}</h2>
                                <button class="pull-right btn btn-primary"><i class="fa fa-download"></i> 다운로드</button>
                        </p>

                        @include( 'web.partials.checkform' )

                </div>

        </div>

</div>

@endsection
