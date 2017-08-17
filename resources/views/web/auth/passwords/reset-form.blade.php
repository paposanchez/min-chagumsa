@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

<div id='sub_full_wrap'>
    <div class='login_box_wrap'>
        {!! Form::open(['route' => ['password.reset-password'], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
        <h3>비밀번호 찾기</h3>
        <h4>회원가입시 사용한 아이디(이메일)를 입력하세요.</h4>

        <div class='br20'></div>

        <div class='ipt_line'>
            <input type='text' class='ipt' id="email" name="email1" placeholder='변경할 비밀번호'>
        </div>
        <div class='br10'></div>
        <div class='ipt_line'>
            <input type='text' class='ipt' id="email" name="email2" placeholder='비밀번호 확인'>
        </div>
        <div class='br20'></div>

        <div class='ipt_line'>
            <button class='btns btns_green' type="submit" id="send">확인</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection


@section( 'footer-script' )
<script type="text/javascript">
    $(function () {

    });
</script>
@endsection
