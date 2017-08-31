@extends( 'web.layouts.blank' )
@section( 'content' )

<!-- <div id='sub_title_wrap'><h2>회원가입<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>회원가입</span></div></h2></div> -->

<div id="sub_full_wrap">
        <div class="login_box_wrap" style="padding:20px;">

                <div class="text-center" style="margin:20px 0px 20px;">
                          {{ Html::image('/assets/themes/v1/web/img/comm/head_logo.png') }}
                        <h3>회원가입</h3>
                </div>

                {!! Form::open(['route' => ['register'], 'id' => 'register-form', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}

                <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-xs-3">{{ trans('web/register.email') }}</label>

                        <div class=" col-xs-9">
                                <input type="email" class="form-control  input-lg" placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail" value="{{ old("email") }}">


                                <span class="help-block">

                                        @if ($errors->has('email'))
                                        {{ $errors->first('email') }}
                                        @else
                                        <small>가입완료 후 인증메일이 발송됩니다.</small>
                                        @endif
                                </span>

                        </div>
                </div>

                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-xs-3">{{ trans('web/register.name') }}</label>

                        <div class=" col-xs-9">
                                <input type="text" class="form-control  input-lg" placeholder="{{ trans('web/register.name') }}" name="name" id="inputName" value="{{ old("name") }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                        {{ $errors->first('name') }}
                                </span>
                                @endif
                        </div>
                </div>


                <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-xs-3">{{ trans('web/register.password') }}</label>
                        <div class=" col-xs-9">
                                <input type="password" class="form-control  input-lg" placeholder="{{ trans('web/register.password') }}" name="password" id="inputPassword">

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
                                <input type="password" class="form-control  input-lg" placeholder="{{ trans('web/register.confirm-password') }}" name="password_confirmation" id="inputPasswordConfirmation">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                </span>
                                @endif
                        </div>
                </div>

                <p class="text-center">
                        <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">가입하기</button>
                </p>
                {!! Form::close() !!}
        </div>
</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )

<script type="text/javascript">
$(function(){
        $("#register-form").validate({
                rules: {
                        name: {
                                required: true,
                                minlength: 2
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
                        email: {
                                required: true,
                                email: true
                        }
                },
                messages: {
                        email: {
                                required: "정확한 메일 주소를 입력해 주세요.",
                                email: '이메일 주소가 잘못 입력 되었습니다.',
                                remote: '이미 등록된 이메일 주소입니다.'
                        },
                        name: "이름을 입력하세요.",
                        password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
                        password_confirmation: "입력된 비밀번호 확인값이 다릅니다."
                }
        });
});

</script>
@endpush
