@extends( 'web.layouts.blank' )
@section( 'content' )

    <div id="sub_full_wrap">
        <div class="login_box_wrap" style="padding:20px;">

            <div class="text-center" style="margin:20px 0px 20px;">
                {{ Html::image('/assets/themes/v1/web/img/comm/head_logo.png') }}
                <h3>비밀번호변경</h3>
            </div>

            {!! Form::open(['url' => 'password/reset', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="inputEmail" class="control-label col-xs-3">{{ trans('web/register.email') }}</label>

                <div class=" col-xs-9">
                    <input type="email" class="form-control  input-lg" placeholder="{{ trans('web/register.email') }}"
                           name="email" id="inputEmail">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        {{ $errors->first('email') }}

                                </span>
                    @endif
                </div>
            </div>

            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="inputPassword" class="control-label col-xs-3">{{ trans('web/register.password') }}</label>
                <div class=" col-xs-9">
                    <input type="password" class="form-control  input-lg"
                           placeholder="{{ trans('web/register.password') }}" name="password" id="inputPassword">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        {{ $errors->first('password') }}
                                </span>
                    @endif
                </div>
            </div>

            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="inputPasswordConfirmation" class="control-label col-xs-3"></label>
                <div class=" col-xs-9">
                    <input type="password" class="form-control  input-lg"
                           placeholder="{{ trans('web/register.confirm-password') }}" name="password_confirmation"
                           id="inputPasswordConfirmation">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                </span>
                    @endif
                </div>
            </div>

            <p class="text-center">
                <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">확인</button>

            </p>
            {!! Form::close() !!}


        </div>


    </div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

    <script type="text/javascript">
        $(function () {
            $("#form").validate({
                debug: true,
                rules: {
                    email: {
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
                messages: {
                    email: "사용자의 이메일을 입력해주세요.",
                    password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
                    password_confirmation: "입력된 비밀번호 확인값이 틀립니다."
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });

    </script>
@endpush
