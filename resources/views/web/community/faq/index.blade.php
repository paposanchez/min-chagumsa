@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">


        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="block  text-center m-t-10  m-b-20" >
                                        <!-- <h5 class="c-white">서브텍스트</h5> -->
                                        <h1 class="c-white">자주하는 질문</h1>
                                        <hr class="line dark">
                                        <!-- <h3 class="c-white c-light">총 <strong></strong>개의 공지사항이 등록되어 있습니다.</h3> -->
                                        <h6 class="c-white c-light ">총 <strong class="">{{ number_format($total_count) }}</strong>개의 게시물이 등록되어 있습니다.</h6>
                                </div>

                        </div>
                </div>

                <div class="card subnavigation">

                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
                                                <li><a href="{{ route('notice.index') }}">공지사항</a></li>
                                                <li class="active"><a href="{{ route('faq.index') }}">FAQ</a></li>
                                                <li><a href="{{ route('contact.index') }}">문의사항</a></li>
                                        </ul>

                                        <div class="tab-content p-t-0">


                                                <table class="table table-hover ">
                                                        <colgroup>
                                                                <col width='15%;'>
                                                                <col width='15%;'>
                                                                <col width='*'>

                                                        </colgroup>
                                                        <thead>
                                                                <tr class="">
                                                                        <th class="text-center">번호</th>
                                                                        <th class="text-center">카테고리</th>
                                                                        <th>제목</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody>

                                                                @unless(count($entrys))
                                                                <tr>
                                                                        <td colspan="4" class="no-result">등록된 문의가 없습니다.</td>
                                                                </tr>
                                                                @endunless

                                                                @foreach($entrys as $key => $entry)
                                                                <tr>
                                                                        <td class="text-center">{{ $start_num - $key }}</td>
                                                                        <td class="text-center">{{ $entry->category->name }}</td>
                                                                        <td><a href="{{ route("faq.show", ["id" => $entry->id]) }}">{{ $entry->subject }}</a></td>

                                                                        @endforeach
                                                                </tbody>
                                                        </table>

                                                        {{--page navigation--}}
                                                        {!! $entrys->render() !!}
                                                </div>

                                        </div>

                                </div>

                        </div>

                </div>
        </section>

        @endsection
