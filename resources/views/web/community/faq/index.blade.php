@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>공지사항</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap'>
        <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
        <li><a class='select' href='{{ route('faq.index') }}'>FAQ</a></li>
        <li><a class='' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
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
                    <th>조회</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><span>공지</span></th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
                <tr>
                    <th>9</th>
                    <td>카검사 사이트 오픈 준비 중입니다.</td>
                    <th>2017년 2월 10일</th>
                    <th>120</th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class='br30'></div>

    <div class='board_pagination_wrap'>
        <ul>
            <li><a href=''><i class="fa fa-angle-double-left"></i></a></li>
            <li><a href='' class='select'>1</a></li>
            <li><a href=''>2</a></li>
            <li><a href=''>3</a></li>
            <li><a href=''>4</a></li>
            <li><a href=''>5</a></li>
            <li><a href=''><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>

</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
