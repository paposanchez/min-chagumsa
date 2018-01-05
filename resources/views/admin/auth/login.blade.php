@extends( 'admin.layouts.login' )

@section('body-class') layout-login @endsection

@section('content')
<div class="login-content" style="
background: url(assets/img/background-gray.jpg) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;
">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">

                <!-- <div class="lcb-form"> -->
                {!! Form::open(['url' => 'login', 'class' =>'lcb-form', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}

                <h3 class="m-b-25">CHAGUMSA ADMINISTRATION</h3>


                <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line">
                                <input type="email" class="form-control" placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail">
                        </div>
                </div>

                <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                        <div class="fg-line">
                                <input type="password" class="form-control" placeholder="{{ trans('web/register.password') }}" name="password" id="inputPassword">
                        </div>
                </div>


                <p class="m-t-25">
                        <small class="text-muted">COPYRIGHTS BY CHAGUMSA</small>
                </p>

                <button type="submit" class="btn btn-login btn-success btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>

                {!! Form::close() !!}

                <div class="lcb-navigation">
                        <a href="" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>회원</span></a>
                        <a href="" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>비밀번호 분실</span></a>
                </div>
        </div>

        <!-- Register -->
        <div class="lc-block" id="l-register">
                <div class="lcb-form">
                        <div class="input-group m-b-20">
                                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Username">
                                </div>
                        </div>

                        <div class="input-group m-b-20">
                                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Email Address">
                                </div>
                        </div>

                        <div class="input-group m-b-20">
                                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                                <div class="fg-line">
                                        <input type="password" class="form-control" placeholder="Password">
                                </div>
                        </div>

                        <a href="" class="btn btn-login btn-success btn-float"><i class="zmdi zmdi-check"></i></a>
                </div>

                <div class="lcb-navigation">
                        <a href="" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
                        <a href="" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                </div>
        </div>

        <!-- Forgot Password -->
        <div class="lc-block" id="l-forget-password">
                <div class="lcb-form">
                        <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>

                        <div class="input-group m-b-20">
                                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Email Address">
                                </div>
                        </div>

                        <a href="" class="btn btn-login btn-success btn-float"><i class="zmdi zmdi-check"></i></a>
                </div>

                <div class="lcb-navigation">
                        <a href="" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>
                        <a href="" data-ma-action="login-switch" data-ma-block="#l-register"><i class="zmdi zmdi-plus"></i> <span>Register</span></a>
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
