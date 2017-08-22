
@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
@endsection

@section( 'content' )
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <form class="form-horizontal">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputSubject" class="control-label col-md-3">제목</label>
                        <div class="col-md-9">
                            <div class="form-control" name="subject" id="inputSubject">{{ $post->subject }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject" class="control-label col-md-3">내용</label>
                        <div class="col-md-9">
                            <div class="form-control" name="subject" id="inputSubject" style="height: 500px;">{{ $post->content }}</div>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="inputName" class="control-label col-md-3">첨부파일</label>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input class="form-control" readonly="" value="http://mme.lge.app/dwn/ext/020/A001/2017/08/17/ee7226ec-cf00-442d-a612-1f29c6fe84d0.pdf" id="upload-origin" type="text">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    @if(count($files) != 0)
                        <div class="form-group">
                            @foreach($files as $key=>$file)
                            <label for="inputName" class="control-label col-md-3">
                                @if($key == 0)
                                첨부파일
                                @endif
                            </label>
                            <div class="col-md-9">
                                <a class="form-control disabled" href="/file/download/{{$file->id}}">
                                    <i class="fa fa-download" aria-hidden="true"></i>&nbsp;{{ $file->original }}
                                </a>
                            </div>
                            <br>
                            @endforeach
                        </div>
                    @endif




                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <a href="{{ route('bcs.notice.index') }}" class="btn btn-default"><i class="fa fa-reply"></i> {{ trans('common.button.back') }}</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection


@section( 'footer-script' )

    <script type="text/javascript">
        $(function () {
            //파일 다운로드
            $("#dwn-orgin").on("click",function(e){
                e.preventDefault();
                window.location.href = $(this).data("dwn");
            });
        })
    </script>
@endsection