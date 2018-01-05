@extends( 'web.layouts.default' )

@section( 'content' )

<section id="content" class="content-alt">

        <div class="container">

                <div class="card">
                        <div class="card-header ch-alt">
                                <h2>{{ $data->subject }}
                                        <small class="">
                                                등록일 <span>{{ $data->updated_at ? $data->updated_at : $data->created_at  }}</span>
                                                <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                조회수 <span>{{ number_format($data->hit) }}</span>
                                        </small>
                                </h2>
                        </div>

                        <div class="card-body card-padding">

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
</section>
@endsection
