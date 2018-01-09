@extends( 'admin.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="login-content" style="background: url(assets/img/background-gray.jpg) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">

        <!-- Login -->
        <div class="lc-block toggled" id="l-login">

                <div class="lcb-form">

                        {!! Form::open(['route' => 'admin.login', 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}

                        <h3 class="m-b-25 text-light">CHAGUMSA <strong>ADMINISTRATION</strong></h3>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <div class="fg-line">
                                                <input type="email" class="form-control" placeholder="{{ trans('register.email') }}" name="email" id="inputEmail">
                                        </div>
                                </div>

                                @if ($errors->has('email'))
                                <small class="help-block">이메일을 확인하세요.</small>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                        <div class="fg-line">
                                                <input type="password" class="form-control" placeholder="{{ trans('register.password') }}" name="password" id="inputPassword">
                                        </div>
                                </div>

                                @if ($errors->has('password'))
                                <small class="help-block">비밀번호를 확인하세요.</small>
                                @endif
                        </div>

                        <button type="submit" class="btn btn-login btn-success btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>

                        {!! Form::close() !!}

                        <p class="m-t-25">
                                <small class="text-muted text-light">COPYRIGHTS BY <strong>차검사</strong></small>
                        </p>
                </div>

                <div class="lcb-navigation">
                        <!-- <a href="" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>회원</span></a> -->
                        <a href="{{ route('admin.password.reqeust') }}" data-ma-block="#l-forget-password"><i>?</i> <span>비밀번호 변경하기</span></a>
                </div>
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
