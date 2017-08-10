@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap'>
        <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
        <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
        <li><a class='select' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
    </ul>

    <div class='br30'></div>

    <div class='board_wrap'>
        <table>
            <colgroup>
                <col style='width:110px;'>
                <col style='width:695px;'>
                <col style='width:135px;'>
                <col style='width:130px;'>
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성일</th>
                    <th>답변</th>
                </tr>
            </thead>
            <tbody>
            @foreach($entrys as $key => $entry)
                <tr>
                    <th>{{ $start_num - $key }}</th>
                    <td><a href="{{ route("inquire.show", ["id" => $entry->id]) }}">{{ $entry->subject }}</a></td>
                    <th>{{ Carbon\Carbon::parse($entry->created_at)->format('Y-m-d') }}</th>
                    <th>
                        @if($entry->is_answered == 0)
                            미답변
                        @else
                            답변 완료
                        @endif
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class='br30'></div>

    <div class='board_pagination_wrap  alg_r'>
        @include('vendor.pagination.web-page', ['paginator' => $entrys])
        <button type="button" class='btn btn-primary wid10 bmd-modalButton' id="write">글쓰기</button>
    </div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function(){
        $('#write').click(function(){
            location.href='{{ route('inquire.create') }}';
        })
    });
</script>

@endpush
