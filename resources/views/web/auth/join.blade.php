@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>회원가입<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>회원가입</span></div></h2></div>

<div id='sub_wrap'>


    <div class='join_wrap'>

        <ul class='join_step'>
            <li class='on link'>
                <strong>01</strong>
                <span>약관동의</span>
            </li>
            <li class='on'>
                <strong>02</strong>
                <span>회원정보입력</span>
            </li>
            <li>
                <strong>03</strong>
                <span>회원가입완료</span>
            </li>
        </ul>

        <div class='br30'></div>
        <div class='br20'></div>

        {!! Form::open(['method' => 'POST','route' => ['register'], 'enctype'=>"multipart/form-data"]) !!}

        <div class='ipt_line ipt_guide' style='width:940px;'>
            <span>카검사는 회원님의 개인정보를 안전하게 보호하고 있으며, 회원님의 명백한 동의 없이는 공개되거나 제3자에게 제공되지 않습니다.<br>자세한 내용은 개인정보취급방침을 확인해 주세요.</span>
        </div>

        <div class='br20'></div>

        <div class='psk_table_wrap'>
            <table>
                <colgroup>
                    <col style='width:140px;'>
                    <col style='width:800px;'>
                </colgroup>
                <tbody>
                    <tr>
                        <th>아이디(이메일)</th>
                        <td>
                            <input type='text' class='ipt wid33' placeholder='이메일을 입력하세요'><span class='ipt_msg warn'>이미 등록된 이메일이거나 잘못 입력하셨습니다.</span>
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호</th>
                        <td>
                            <input type='password' class='ipt wid33' placeholder='비밀번호를 입력하세요'><span class='ipt_msg'>8~16 자리의 영문/숫자/특수문자를 두 가지 이상 조합하세요.</span>
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호 확인</th>
                        <td>
                            <input type='password' class='ipt wid33' placeholder='비밀번호를 다시 입력하세요'><span class='ipt_msg'></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class='br30'></div>

        <div class='ipt_line wid20'>
            <button class='btns btns_green' type="submit" style='display:inline-block;'>회원가입</button>
        </div>

        {!! Form::close() !!}

    </div>

</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
