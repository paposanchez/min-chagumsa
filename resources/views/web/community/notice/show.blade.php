@extends( 'web.layouts.default' )

@section('breadcrumbs')
    @includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )
    <div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

    <div id="sub_wrap">

        <ul class='menu_tab_wrap'>
            <li><a class='select' href='{{ route('notice.index') }}'>공지사항</a></li>
            <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
            <li><a class='' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
        </ul>

        <div class="board_view_wrap">
            <div class="board_view_title">
                <div>{{ $data->subject }}</div>
                <ul>
                    <li>작성일 <span>{{ $data->updated_at ? $data->updated_at->format("Y-m-d") : $data->created_at->format("Y-m-d")  }}</span></li>
                    <li>hit <span>{{ number_format($data->hit) }}</span></li>
                </ul>
            </div>
            <div class="board_view_cont">

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


        <p class="form-control-static">

            <button class="btn btn-default " id='c-list' data-route="{{ route($board_namespace.'.index') }}">목록</button>


            <button class="btn btn-default pull-right" id='next' style="margin:0px 0px 0px 5px;" data-route="{{ ($next)? route($board_namespace.'.show', ['id' => $next]): '' }}">다음</button>

            <button class="btn btn-default pull-right" id='prev' data-route="{{ ($prev)? route($board_namespace.'.show', ['id' => $prev]): '' }}">이전</button>
        </p>


    </div>
@endsection

@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function(){
        $("#c-list").on("click", function(){ location.href = $(this).data("route"); });

        if(!$("#prev").data("route")){
            $("#prev").attr("disabled", true);
        }
        $("#prev").on("click", function(){
            location.href = $("#prev").data("route");
        });

        if(!$("#next").data("route")){
            $("#next").attr("disabled", true);
        }
        $("#next").on("click", function(){
            location.href = $("#next").data("route");
        });





//        $(document).on("click", ".plugin-attach-download", function (e) {
//            e.preventDefault();
//            var id = $(this).closest(".plugin-attach-file").data('id');
//            $.fileDownload('/file/download/' + id, {
//                error: function (e) {
//                    $.notify(ZFOOP.Languages.can_not_process_retry, "danger");
//                }
//            });
//
//        });
    });


</script>
@endpush
