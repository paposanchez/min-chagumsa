@extends( 'web.layouts.blank' )










@section( 'content' )

<div id="sub_full_wrap">


    <div class="login_box_wrap" style="padding:20px;">

            <div class="text-center" style="margin:20px 0px 20px;">
                      {{ Html::image('/assets/themes/v1/web/img/comm/head_logo.png') }}
                      <h3>회원탈퇴</h3>
                      <h4>인증서를 제외한 회원정보는 모두 삭제됩니다.</h4>
            </div>



            {!! Form::open([ 'route' => ['mypage.profile.store'], 'class' =>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id' => 'user-form']) !!}

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="inputEmail" class="control-label col-xs-3">{{ trans('web/register.email') }}</label>
                    <div class="col-xs-9">
                            <p class="form-control-static">{{ $profile->email }}</p>
                    </div>
            </div>


            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="inputPassword" class="control-label col-xs-3">{{ trans('web/register.password') }}</label>
                    <div class="col-xs-9">
                            <input type="password" class="form-control " placeholder="{{ trans('web/register.password') }}" name="password" id="inputPassword">
                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                            {{ $errors->first('password') }}
                    </span>
                    @endif
            </div>

            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="inputPasswordConfirmation" class="control-label col-xs-3"></label>
                    <div class="col-xs-9">
                            <input type="password" class="form-control " placeholder="{{ trans('web/register.confirm-password') }}" name="password_confirmation" id="inputPasswordConfirmation">
                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                            {{ $errors->first('password_confirmation') }}
                    </span>
                    @endif
            </div>

            <p class="text-center">
                    <a href='/mypage/profile' class="btn btn-lg btn-default" data-loading-text="처리중...">취소</a>
                            <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">회원탈퇴</button>
            </p>

            {!! Form::close() !!}

            </div>
    </div>
</div>
@endsection





@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function(){
        $("#user-form").validate({
                rules: {
                        password: {
                                required: true,
                                minlength: 8,
                                maxlength: 16
                        },
                        password_confirmation: {
                                required: true,
                                minlength: 8,
                                maxlength: 16,
                                equalTo: "[name='password']"
                        },
                },
                messages:{
                        password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
                        password_confirmation: "입력된 비밀번호 확인값이 틀립니다."
                }
        });

        //인증메일 재전송
        $("#email-resend").on("click", function(){
                //todo 메일 resend를 ajax로 연동함.
        });

        $('#leave').click(function (){
                location.href='/mypage/leave';
        });
});
</script>


@endpush
