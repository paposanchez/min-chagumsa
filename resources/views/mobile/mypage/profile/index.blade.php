@extends( 'mobile.layouts.default' )

@section( 'content' )
<div id='sub_title_wrap'>회원정보 수정</div>

<div id='sub_wrap'>
    <div class='br20'></div>
    <div class='join_term_wrap'>
        <label>아이디(이메일)</label>
    </div>
    <div class='logout_wrap'>
        {{ Auth::user()->email }}
        <button class='btns btns_navy' id="logout" data-url="{{ url("/logout") }}">로그아웃</button>
    </div>

    <div class='br30'></div>

    {!! Form::open([ 'route' => ['mypage.profile.store'], 'class' =>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id' => 'user-form']) !!}
    <div class='join_term_wrap'>
        <label>비밀번호 변경</label>
        <div class='ipt_guide2'>8~16자리의 영문/숫자/특수문자를 두 가지 이상 조합하세요</div>
        <div class='br10'></div>
        <div class='ipt_line br10 {{ $errors->has('old_password') ? 'has-error' : '' }}'>
            <input type='password' class='ipt form-control' name="old_password" placeholder='현재 비밀번호'>
            @if ($errors->has('old_password'))
                <span class="help-block">
                    {{ $errors->first('old_password') }}
                </span>
            @endif
        </div>
        <div class='ipt_line br10 {{ $errors->has('password') ? 'has-error' : '' }}'>
            <input type='password' class='ipt form-control' placeholder='신규 비밀번호' name="password" id="inputPassword">
            @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
        <div class='ipt_line br10 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}'>
            <input type='password' class='ipt form-control' placeholder='비밀번호 재확인' name="password_confirmation" id="inputPasswordConfirmation">
            @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password_confirmation') }}
                </span>
            @endif
        </div>
        <div class='br20'></div>
        <div class='ipt_line'>
            <button class='btns btns_green' style='display:inline-block;' type="submit" data-loading-text="처리중...">비밀번호 변경</button>
        </div>
    </div>
    {!! Form::close() !!}

</div>
@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        $("#logout").on("click", function () {
            location.href = $(this).data('url');
        });

        $("#user-form").validate({
            rules: {
                old_password:{
                    required: true,
                    minlength: 8,
                    maxlength: 16,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    maxlength: 16,
                    equalTo: "#inputPasswordConfirmation"
                },
            },
            messages:{
                old_password: {
                    required: "현재 사용중인 비밀번호를 입력해 주세요.",
                    old_password: "새 비밀번호는 8~16자리의 영문/숫자/특수문자 입니다.",
                },
                password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
                password_confirmation: "입력된 새 비밀번호 확인값이 틀립니다."
            }
        });
    })
</script>

@endpush
