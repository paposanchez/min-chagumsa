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

        {!! Form::open(['route' => ["inquire.store"], 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
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
                        <textarea class="edit_email" name="email"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td>
                        <textarea class="edit_subject" name="subject"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td>
                        <textarea class="edit_content" name="content"></textarea>
                    </td>
                </tr>
                {{--<tr>--}}
                    {{--<th>첨부</th>--}}
                    {{--<td>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                </tbody>
            </table>
        </div>

        <ul class="board_btn_wrap">
            <li>
                <button class="btns2" id='c-list' >저장</button>
            </li>
        </ul>
        {!! Form::close() !!}
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