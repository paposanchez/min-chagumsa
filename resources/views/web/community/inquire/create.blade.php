@extends( 'web.layouts.default' )

@section('breadcrumbs')
    {{--    {{ dd(Breadcrumbs::generate('web.community.inquire')) }}--}}
    @includeIf('/vendor/breadcrumbs/default', ['breadcrumbs' => Breadcrumbs::generate('web.community.'.$board_namespace)])
@endsection

@section( 'content' )

<div id='sub_title_wrap'><h2>고객센터<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 고객센터 <i class="fa fa-angle-right"></i> <span>1:1 문의</span></div></h2></div>

<div id='sub_wrap'>

    <ul class="menu_tab_wrap">
        <li><a class='' href='{{ route('notice.index') }}'>공지사항</a></li>
        <li><a class='' href='{{ route('faq.index') }}'>FAQ</a></li>
        <li><a class='select' href='{{ route('inquire.index') }}'>1:1 문의</a></li>
    </ul>

    <div class='br30'></div>
    {!! Form::open(['route' => ["inquire.store"], 'class' => 'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}
    <div class='psk_table_wrap'>
        <table>
            <colgroup>
                <col style='width:140px;'>
                <col style='width:800px;'>
            </colgroup>
            <tbody>
            <tr>
                <th>이메일</th>
                <td>
                    <input type='text' class='ipt wid33' name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"><span class='ipt_msg'>* 답변내용은 이메일로 받아보실 수 있습니다</span>
                </td>
            </tr>
            <tr>
                <th>제목</th>
                <td class="has-error">
                    <input type='text' class='ipt wid33' name="subject" placeholder='제목을 입력하세요'>
                </td>
            </tr>
            <tr>
                <th>내용</th>
                <td class="has-error">
                    <textarea class='tarea' name="content" placeholder='내용을 입력하세요'></textarea>
                </td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td class="has-error">
                    <input type='password' class='ipt wid20' name="password" placeholder='제목을 입력하세요'>
                </td>
            </tr>
            {{--<tr>--}}
                {{--<th>파일첨부</th>--}}
                {{--<td>--}}
                    {{--<div class='psk_fileUp'>--}}
                        {{--<input type='text' class='file_name ipt wid75' placeholder='파일을 선택하세요' readonly>--}}
                        {{--<label for='inquery_file' class='btns btns2' style="margin-top: 5px;">파일첨부</label>--}}
                        {{--<input type='file' id='inquery_file' class='psk_uploader'>--}}
                    {{--</div>--}}
                {{--</td>--}}
            {{--</tr>--}}
            </tbody>
        </table>
    </div>

    <div class='br30'></div>

    <div class='ipt_line wid20'>
        <button class='btns btns_green' style='display:inline-block;'>문의하기</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function() {
        //form validation
        $("#form").validate({
            debug: true,
            rules: {
                subject : {
                    required: true
                },
                content : {
                    required: true
                },
                password : {
                    required: true,
                    minlength: 4,
                    maxlength: 16
                }
            },
            messages: {
                subject : "문의하실 내용의 제목을 입력해주세요.",
                content : "문의하실 내용을 입력해주세요.",
                password : "비밀번호를 확인하세요.(4~16 자리의 영문/숫자/특수문자)"
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });

</script>
@endpush