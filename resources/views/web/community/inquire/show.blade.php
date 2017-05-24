@extends( 'web.layouts.default' )

@section('breadcrumbs')
{{--    {{ dd(Breadcrumbs::generate('web.community.inquire')) }}--}}
    @includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )
    <div id="sub_title_wrap"><h2>고객센터<div class="sub_title_shortCut">Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>1:1 문의</span></div></h2></div>

    <div id="sub_wrap">

        <ul class="menu_tab_wrap">
            <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
            <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
            <li><a class='select' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
        </ul>

        <div class="br30"></div>

        <div class="psk_table_wrap">
            <table>
                <colgroup>
                    <col style="width:140px;">
                    <col style="width:800px;">
                </colgroup>
                <tbody>
                <tr>
                    <th>이메일</th>
                    <td>
                        {{ Auth::user()->email }}
                    </td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td>
                        {{ $data->subject }}
                    </td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td>
                        {!!  nl2br($data->content) !!}
                    </td>
                </tr>
                <tr>
                    <th>답변</th>
                    <td>
                        @if($data->is_answered === 1)
                            {!! nl2br($data->answered) !!}
                        @else
                            답변대기중입니다.<br>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>첨부</th>
                    <td>
                        @if(count($data->files) > 0)
                            <div class="files">
                            <!--<h4 class="toggle-files">{{ trans("web/post.uploaded_files") }}</h4>-->
                                <div class="file-list">
                                    @foreach($data->files as $file)
                                        <a href="/file/download/{{ $file->id }}" class="file">{{ $file->original }}

                                            <span class="info">{{ Helper::formatBytes($file->size) }} / {{ trans("web/post.download_view", ["count"=>number_format($file->download)]) }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <ul class="board_btn_wrap">
            <li>
                <button class="btns2" id='c-list' data-route="{{ route($board_namespace.'.index') }}">목록</button>
            </li>
        </ul>
    </div>

@endsection

@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function() {
        $("#c-list").on("click", function () {
            location.href = $(this).data("route");
        });

    });
</script>
@endpush