@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

<div id='sub_full_wrap'>
    <div class='login_box_wrap'>
        {!! Form::open(['url' => 'password/email', 'class' =>'form-horizontal', 'id' => 'verify-form', 'method' => 'post', 'role' => 'form']) !!}
        <h3>비밀번호 찾기</h3>
        <h4>회원가입시 사용한 아이디(이메일)를 입력하세요.</h4>

        <div class='br20'></div>

        <div class='ipt_line'>
            <input type='text' class='ipt' id="email" name="email" placeholder='아이디 (이메일)'>
        </div>

        <div class='br20'></div>

        <div class='ipt_line'>
            <button class='btns btns_green' data-loading-text="처리중..." type="submit" id="send">확인</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection


@push( 'footer-script' )

<script type="text/javascript">
 $(function(){
    $("#verify-form").validate({
        debug: true,
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "정확한 메일 주소를 입력해 주세요.",
                email: '이메일 주소가 잘못 입력 되었습니다.',
            }
        },

        submitHandler: function(form){
            form.submit();
        }
    });
});

</script>
@endpush
