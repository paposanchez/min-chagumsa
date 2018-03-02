@extends( 'web.layouts.default' )

@section( 'content' )

<section id="content" class="content-alt">

        <div class="row">
                <div class="col-md-12">
                        <div class="block  text-center m-t-10  m-b-20" >
                                <!-- <h5 class="c-white">서브텍스트</h5> -->
                                <h1 class="c-white">이용약관</h1>
                                <hr class="line dark">
                                <!-- <h3 class="c-white c-light">최종수정일 : 2018년 03월 01일</h3> -->
                                <h6 class="c-white c-light ">최종수정일 : 2018년 03월 01일</h6>
                        </div>

                </div>
        </div>

        <div class="card subnavigation">

                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
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
