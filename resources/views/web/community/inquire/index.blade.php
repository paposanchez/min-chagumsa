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
            @if($entrys->total())
                @foreach($entrys as $key => $row)
                <tr>
                    <th>{{ $start_num - $key }}</th>
                    <td>
                        @if($row->email == Auth::user()->email)
                            <a href="{{ route("inquire.show", ["id" => $row->id]) }}">{{ mb_strimwidth($row->subject, 0, 30, '...') }}</a>
                        @else
                            {{ mb_strimwidth($row->subject, 0, 30, '...') }}
                        @endif
                    </td>
                    <th>{{ \App\Helpers\Helper::getDbDate($row->created_at, $row->updated_at) }}</th>
                    <th>{{ ($row->is_answered)? "완료": "대기중" }}</th>
                </tr>
                @endforeach
            @else
                <th colspan="4">1:1문의 내용이 없습니다.</th>
            @endif
            </tbody>
        </table>
    </div>

    <div class='br30'></div>

    <div class='board_pagination_wrap'>
        @include('vendor.pagination.web-page', ['paginator' => $entrys])
    </div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function(){

    });
</script>

@endpush
