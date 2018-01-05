@extends( 'web.layouts.default' )

@section( 'content' )
<div class="hometainer hometainer-sub bgm-black text-center">
        <div class="container">
                <h1 class="c-white"> is a fully responsive landing page template</h1>
                <h4 class="c-white c-light">Zodkoo is a fully responsive landing page built using the latest Bootstrap framework. It's designed for describing your app, agency or business. The clean and well commented code allows easy customization of the theme.</h4>
                <a href="" class="btn btn-danger">Get Started</a>
        </div>
</div>

<section id="content" class="content-alt">

        <div class="container">

                <div class="card">

                        <div class="card-body card-padding">

                                <div role="tabpanel">
                                        <ul class="tab-nav" role="tablist">
                                                <li class="active"><a href="{{ route('agreement.usage') }}">이용약관</a></li>
                                                <li><a href="{{ route('agreement.term') }}">전자금융거래약관</a></li>
                                                <li><a href="{{ route('agreement.privacy') }}">개인정보취급방침</a></li>
                                        </ul>

                                        <div class="tab-content">
                                                @include( 'web.partials.agreement.usage' )
                                        </div>

                                </div>

                        </div>

                </div>

        </div>
</section>


@endsection
