@extends( 'web.layouts.landing' )


@section('body-attr') style="background-image: url('assets/img/background-landing.jpeg'); " @endsection


@section( 'content' )

{{-- 헤더 메뉴 --}}
@includeIf( 'web.partials.header' )

{{-- 메인 배너 --}}
<section id="content" class="">

        <div class="container">

                <div class="row">
                        <div class="col-lg-6">
                                <h1 class="text-white text-lighter m-t-20">Car Inspection Valueation Warranty</h1>
                                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt voluptates rerum eveniet sapiente repellat esse, doloremque quod recusandae deleniti nostrum assumenda vel beatae sed aut modi nesciunt porro quisquam voluptatem.</p>
                        </div>
                </div>
        </div>
</section>


{{-- 푸터 카피라이트 --}}
{{-- @includeIf( 'web.partials.footer' ) --}}


@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

@endpush
