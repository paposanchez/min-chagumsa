@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="login-content">

        <!-- Login -->
        <div class="lc-block lc-block-alt toggled" id="l-login">

                <div class="lcb-form">
                        {!! Form::open(['route' => 'login', 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}

                        <h3 class="m-b-25 text-light">차검사 <strong>{{ trans("login.title") }}</strong></h3>


                        <div class="form-group fg-float  {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="fg-line">
                                        <input type="email" class="form-control fg-input" name="email" id="inputEmail">
                                        <label class="fg-label">이메일</label>
                                </div>

                                @if ($errors->has('email'))
                                <small class="help-block">이메일을 확인하세요.</small>
                                @endif
                        </div>

                        <div class="form-group fg-float  {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="fg-line">
                                        <input type="password" class="form-control fg-input" name="password" id="inputPassword">
                                        <label class="fg-label">비밀번호</label>
                                </div>

                                @if ($errors->has('password'))
                                <small class="help-block">비밀번호를 확인하세요.</small>
                                @endif
                        </div>

                        <p class="text-center">
                                <button data-loading-text="처리중..." type="submit" class="btn btn-success  btn-block btn-lg" >로그인</button>
                        </p>
                        {!! Form::close() !!}


                        <p class="text-center">
                                로그인 진행 시 차검사의 <a href="{{ route('agreement.privacy') }}">개인정보 수집/이용</a>에 동의하신 것으로 확인합니다
                        </p>

                        <hr>


                        <a href='{{ route('register') }}' class="btn btn-block btn-lg btn-primary" data-loading-text="처리중..." type="submit">
                                회원가입
                        </a>

                        <a href='{{ route('password.request') }}' class="btn btn-block btn-lg btn-info" data-loading-text="처리중..." type="submit">
                                비밀번호변경
                        </a>

                        <p class="m-t-25">
                                <small class="text-muted text-light">COPYRIGHTS BY <strong>차검사</strong></small>
                        </p>
                </div>

                <!-- <div class="lcb-navigation">
                <a href="" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>회원</span></a>
                <a href="{{ route('admin.password.reqeust') }}"><i>?</i> <span>비밀번호 변경하기</span></a>
        </div> -->
</div>

</div>

@endsection


@push( 'footer-script' )
<script type="text/javascript">
$(function () {

        //form validation
        // $("#login-form").validate({
        //         rules: {
        //                 email: {
        //                         required: true,
        //                         email: true
        //                 },
        //                 password: {
        //                         required: true
        //                 }
        //         },
        //         messages: {
        //                 email: "정확한 이메일 주소를 입력해 주세요.",
        //                 password: "비밀번호를 확인하세요."
        //         },
        //         submitHandler: function (form) {
        //
        //                 form.submit();
        //         }
        // });
});

</script>
@endpush
