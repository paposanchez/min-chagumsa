@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

<div id='sub_full_wrap'>
    <div class='login_box_wrap'>
        {!! Form::open(['url' => 'password/reset', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}
        <h3>비밀번호 찾기</h3>
        <h4>회원가입시 사용한 아이디(이메일)를 입력하세요.</h4>

        <div class='br20'></div>

        <div class='ipt_line has-error'>
            <input type='text' class='ipt' id="email" name="email" placeholder='변경할 비밀번호'>
        </div>

        <div class='br10'></div>

        <div class='ipt_line has-error'>
            <input type='password' class='ipt' id="password" name="password" placeholder='변경할 비밀번호'>
        </div>
        <div class='br10'></div>

        <div class='ipt_line has-error'>
            <input type='password' class='ipt' id="password-confirm" name="password_confirmation" placeholder='비밀번호 확인'>
        </div>
        <div class='br20'></div>

        <div class='ipt_line'>
            <button class='btns btns_green' type="submit" id="send">확인</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection


@push( 'footer-script' )
<script type="text/javascript">
    $(function () {
        $("#form").validate({
            debug: true,
            rules: {
                email:{
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16
                },
                password_confirmation: {
                    minlength: 8,
                    maxlength: 16,
                    equalTo: "[name='password']"
                },
            },
            messages:{
                email : "사용자의 이메일을 입력해주세요.",
                password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
                password_confirmation: "입력된 비밀번호 확인값이 틀립니다."
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>
@endpush
