@extends( 'web.layouts.default' )

@section('breadcrumbs')
@includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )
<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id="sub_wrap">

        <ul class='menu_tab_wrap'>
                <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
                <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
                <li><a class='select' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
        </ul>

        <div class="board_view_wrap_new">
                <div class="board_view_title_new">
                        <div>{{ $data->subject }}</div>
                        <ul>
                                <li>작성자 <span>{{ $data->email  }}</span></li>
                                <li>작성일 <span>{{ $data->updated_at ? $data->updated_at->format("Y-m-d") : $data->created_at->format("Y-m-d")  }}</span></li>
                        </ul>
                </div>
                <div class="board_view_cont_new">

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

                        <h4>문의내용</h4>
                        <div class="block bg-warning">
                                {!! $data->content !!}
                        </div>

                        <div class="" style="margin-top:20px;">
                                <h4>답변내용
                                        @if($data->is_answered)
                                        <small class="pull-right">답변일 {{ $data->updated_at }}</small>
                                        @endif
                                </h4>
                                <div class="block bg-info">
                                        @if($data->is_answered)
                                        {!! $data->answer !!}
                                        @else
                                        답변대기중입니다.
                                        @endif
                                </div>
                        </div>

                </div>
        </div>

        <p class="form-control-static">
                <a href="{{ route($board_namespace.'.index') }}" class="btn btn-default">목록</a>
                @if(!$data->is_answered)
                &nbsp;<button id="post-delete" class="btn btn-danger pull-right">삭제하기</button>
                <a  href="{{ route($board_namespace.'.edit', [$data->id]) }}" class="btn btn-default pull-right">수정하기</a>
                @endif
        </p>

</div>


{!! Form::open(['route' => [$board_namespace.".destroy", $data->id],  'method' => 'DELETE', 'role' => 'form', 'id'=>'inquireDeleteFrm']) !!}
{!! Form::close() !!}


@endsection

@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function(){


       $(document).on("click", "#post-delete", function (e) {
           e.preventDefault();

           if(confirm("해당 게시물을 삭제하시겠습니까?"))
           {

                   $("#inquireDeleteFrm").submit();
           }



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
