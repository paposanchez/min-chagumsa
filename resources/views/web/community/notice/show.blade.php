@extends( 'web.layouts.default' )

@section( 'content' )

<section id="content" class="content-alt">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="block  text-center m-t-10  m-b-20" >
                                        <!-- <h5 class="c-white">서브텍스트</h5> -->
                                        <h1 class="c-white">공지사항</h1>
                                        <hr class="line dark">
                                        <h3 class="c-white c-light">{{ $data->subject }}</h3>
                                        <h6 class="c-white c-light ">등록일 <span class="c-black">{{ $data->updated_at ? $data->updated_at : $data->created_at  }}</span>
                                        <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                        조회수 <span class="c-black">{{ number_format($data->hit) }}</span></h6>                                </div>

                        </div>
                </div>

                <div class="card subnavigation">

                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
                                                <li class="active"><a href="#" class="history-back"><i class="zmdi zmdi-arrow-left"></i> 뒤로가기</a></li>
                                        </ul>

                                        <div class="tab-content">

                                                @if(count($files) != 0)
                                                <div style="margin-bottom: 30px;">
                                                        <h4 class="text-left">첨부파일</h4>
                                                        @foreach($files as $file)
                                                        <a href="/file/download/{{$file->id}}">
                                                                <i class="fa fa-download" aria-hidden="true"></i>&nbsp;{{ $file->original }}
                                                        </a>
                                                        <br>
                                                        @endforeach
                                                </div>
                                                @endif

                                                {!! $data->content !!}
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>
@endsection
