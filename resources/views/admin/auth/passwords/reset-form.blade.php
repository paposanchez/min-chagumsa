@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection



@section('content')
<div class="login-content">

        <!-- Login -->
        <div class="lc-block lc-block-alt toggled" id="l-password">

                <div class="lcb-form">

                        {!! Form::open(['route' => 'admin.password.request', 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}

                        <input type="hidden" name="token" value="{{ $token }}" />


                        <h3 class="m-b-25 text-light">CHAGUMSA <strong>{{ trans("passwords.verify.title") }}</strong></h3>
                        <p class="text-muted">{{ trans("passwords.verify.desc") }}</p>


                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                                <input type="email" class="form-control" placeholder="{{ trans('register.email') }}" name="email" id="inputEmail">
                                        </div>
                                </div>

                                @if ($errors->has('email'))
                                <small class="help-block">{{ $errors->first('email')  }}</small>
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
                                <small class="help-block">{{ $errors->first('password')  }}</small>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                        <div class="fg-line">
                                                <input type="password" class="form-control" placeholder="{{ trans('register.password_confirmation') }}" name="password_confirmation" id="inputPassword">
                                        </div>
                                </div>

                                @if ($errors->has('password_confirmation'))
                                <small class="help-block">{{ $errors->first('password_confirmation')  }}</small>
                                @endif
                        </div>


                        <p class="text-center">
                                <button data-loading-text="처리중..." type="submit" class="btn btn-success  btn-block btn-lg" >비밀번호 변경</button>
                        </p>


                        {!! Form::close() !!}

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

{{ print_r($errors) }}

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
