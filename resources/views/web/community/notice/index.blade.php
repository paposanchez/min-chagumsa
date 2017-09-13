@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id='sub_wrap'>

        <ul class='menu_tab_wrap'>
                <li><a class='select' href='{{ route('notice.index') }}'>공지사항</a></li>
                <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
                <li><a class='' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
        </ul>

        <div class='board_wrap'>
                <table class="table table-hover ">
                        <colgroup>
                                <col width='110px;'>
                                <col width='*'>
                                <col width='135px;'>
                                <col width='130px;'>
                        </colgroup>
                        <thead>
                                 <tr class="">
                                        <th class="text-center">번호</th>
                                        <th>제목</th>
                                        <th class="text-center">작성일</th>
                                        <th class="text-center">조회</th>
                                </tr>
                        </thead>

                        <tbody>

                                @unless($entrys)
                                <tr>
                                        <td colspan="4" class="no-result">등록된 공지사항이 없습니다.</td>
                                </tr>
                                @endunless

                                @foreach($entrys as $key => $row)
                                <tr>
                                        <td class="text-center">{{ $start_num - $key }}</td>
                                        <td><a href="{{ route("notice.show", ["id" => $row->id]) }}">{{ mb_strimwidth($row->subject, 0, 50, '...') }}</a></td>
                                        <td class="text-center">{{ $row->updated_at ? $row->updated_at->format("Y-m-d") : $row->created_at->format("Y-m-d") }}</td>
                                        <td class="text-center">{{ number_format($row->hit) }}</td>
                                </tr>
                                @endforeach



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
@endpush
