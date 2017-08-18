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

        <div class="br30"></div>

        <div class="board_view_wrap">
            <div class="board_view_title">
                <div>{{ $data->subject }}</div>
                <ul>
                    <li>작성일 <span>{{ \App\Helpers\Helper::getDbDate($data->created_at, $data->updated_at) }}</span></li>
                    <li>hit <span>{{ number_format($data->hit) }}</span></li>
                </ul>
            </div>
            <div class="board_view_cont">
                {!! $data->content !!}
            </div>

            @if(count($files) != 0)
                <div style="border-bottom: 1px solid #7b7b7b; margin-top: 10px; padding-bottom: 10px; padding-left: 20px;">
                @foreach($files as $file)
                    <a href="/file/download/{{$file->id}}">
                        <i class="fa fa-download" aria-hidden="true"></i>&nbsp;{{ $file->original }}
                    </a>
                    <br>
                @endforeach
                </div>
            @endif

            <ul class="board_btn_wrap">
                <li>
                    <button class="btns2" id='c-list' data-route="{{ route($board_namespace.'.index') }}">목록</button>
                </li>
                <li>
                    <button class="btns2" id='prev' data-route="{{ ($prev)? route($board_namespace.'.show', ['id' => $prev]): '' }}">이전</button>
                    <button class="btns2" id='next' data-route="{{ ($next)? route($board_namespace.'.show', ['id' => $next]): '' }}">다음</button>
                </li>
            </ul>
        </div>

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