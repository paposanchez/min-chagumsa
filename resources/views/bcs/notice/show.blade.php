
@extends( 'bcs.layouts.default' )

@section('breadcrumbs')
    @include('/vendor/breadcrumbs/wide', ['breadcrumbs' => Breadcrumbs::generate('bcs.order')])
@endsection

@section( 'content' )

    <div class="container-fluid">

        <div class="row margin-bottom">

            <div class="col-md-12">

                <fieldset>
                    <div class="form-group">
                        <label for="inputSubject" class="control-label col-md-2">{{ trans('admin/post.subject') }}</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{ trans('admin/post.subject') }}" name="subject" id="inputSubject" value="{{ $post->subject or old('subject') }}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputName" class="control-label col-md-2 text-left">원본파일</label>
                        <div class="col-md-10">

                            <div class="input-group">
                                <input class="form-control" readonly="" value="http://mme.lge.app/dwn/ext/020/A001/2017/08/17/ee7226ec-cf00-442d-a612-1f29c6fe84d0.pdf" id="upload-origin" type="text">
                                <span class="input-group-btn">
                                    <button id="dwn-orgin" data-dwn="http://mme.lge.app/dwn/ext/020/A001/2017/08/17/ee7226ec-cf00-442d-a612-1f29c6fe84d0.pdf" data-file_name="2015년_결산_및_2016년_전망보고서_(최종_4도)_160225.pdf" class="btn btn-primary" type="button">Download</button>
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputContent" class="control-label col-md-2">{{ trans('admin/post.content') }}</label>
                        <div class="col-md-10">
                        <textarea  class="form-control" rows="10" placeholder="{{ trans('admin/post.content') }}" name="content" id="inputContent">{{ $post->content or old('content') }}</textarea>

                        </div>
                    </div>



                </fieldset>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 br15">
                <p class="text-center">
                    <a class="btn btn-primary" href="{{ url('notice') }}">목록</a>
                </p>
            </div>
        </div>
    </div>

@endsection


@section( 'footer-script' )

    <script type="text/javascript">
        $(function () {
            //파일 다운로드
            $("#dwn-orgin").on("click",function(e){
                alert('a');
                e.preventDefault();
                window.location.href = $(this).data("dwn");
            });
        })
    </script>
@endsection