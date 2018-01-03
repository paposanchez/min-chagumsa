@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">
        <div class="container">

                <div class="card">
                        
                        <div class="card-body card-padding">

                                <div role="tabpanel">
                                        <ul class="tab-nav" role="tablist">
                                                <li><a href="{{ route('agreement.usage') }}">이용약관</a></li>
                                                <li class="active"><a href="{{ route('agreement.term') }}">전자금융거래약관</a></li>
                                                <li><a href="{{ route('agreement.privacy') }}">개인정보취급방침</a></li>
                                        </ul>

                                        <div class="tab-content">
                                                @include( 'web.partials.agreement.term' )
                                        </div>

                                </div>

                        </div>

                </div>

        </div>
</section>
@endsection
