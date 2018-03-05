@extends( 'web.layouts.default' )

@section( 'content' )

{{-- 헤더 메뉴 --}}
@includeIf( 'web.partials.header' )

<div class="hometainer hometainer-alt background" style="height:500px; background-image: url('assets/img/background.png'); ">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <h1 class="">차검사 진단서비스 지역</h1>
                                <h4 class="c-white c-light">Zodkoo is a fully responsive landing page built using the latest Bootstrap framework. It's designed for describing your app, agency or business. The clean and well commented code allows easy customization of the theme.</h4>
                                <a href="" class="btn btn-danger">Get Started</a>

                        </div>
                </div>

        </div>
</div>





<div class="hometainer hometainer-alt bgm-white">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <h1 class="">차검사 진단서비스 지역</h1>
                                <h4 class="c-white c-light">Zodkoo is a fully responsive landing page built using the latest Bootstrap framework. It's designed for describing your app, agency or business. The clean and well commented code allows easy customization of the theme.</h4>
                                <a href="" class="btn btn-danger">Get Started</a>

                        </div>
                </div>

        </div>
</div>

<div class="hometainer hometainer-alt bgm-gray">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <h1 class="">OUR PARTNERS</h1>
                                <h4 class="c-white c-light">Zodkoo is a fully responsive landing page built using the latest Bootstrap framework. It's designed for describing your app, agency or business. The clean and well commented code allows easy customization of the theme.</h4>
                                <a href="" class="btn btn-danger">Get Started</a>

                        </div>
                </div>

        </div>
</div>







{{-- 푸터 카피라이트 --}}
@includeIf( 'web.partials.footer' )


@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

@endpush
