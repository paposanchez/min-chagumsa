@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>회원정보 수정</span></div></h2></div>

<div id='sub_wrap'>

        <ul class='menu_tab_wrap'>
                <li><a class='' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
                <li><a class='select' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
        </ul>

        <div class='br30'></div>

        {!! Form::open([ 'route' => ['mypage.profile.store'], 'class' =>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id' => 'user-form']) !!}

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="inputEmail" class="control-label col-xs-3">{{ trans('web/register.email') }}</label>
                        <div class="col-xs-9">
                                <p class="form-control-static">{{ $profile->email }}</p>
                        </div>
                </div>

                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="control-label col-xs-3">{{ trans('web/register.name') }}</label>
                        <div class="col-xs-4">
                                <input type="text" class="form-control " value="{{ $profile->name }}" placeholder="{{ trans('web/register.name') }}" name="name" id="inputName">
                        </div>

                        @if ($errors->has('name'))
                        <span class="help-block">
                                {{ $errors->first('name') }}
                        </span>
                        @endif
                </div>


                <div class="form-group  {{ $errors->has('old_password') ? 'has-error' : '' }}">
                        <label for="inputPasswordConfirmation" class="control-label col-xs-3">현재 비밀번호</label>
                        <div class="col-xs-4">
                                <input type='password' name="old_password" class='form-control ' placeholder='현재 비밀번호'>
                        </div>
                        @if ($errors->has('old_password'))
                        <span class="help-block">
                                {{ $errors->first('old_password') }}
                        </span>
                        @endif
                </div>


                <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="control-label col-xs-3">새 비밀번호</label>
                        <div class="col-xs-4">
                                <input type="password" class="form-control " placeholder="새 비밀번호" name="password" id="inputPassword">
                        </div>
                        @if ($errors->has('password'))
                        <span class="help-block">
                                {{ $errors->first('password') }}
                        </span>
                        @endif
                </div>

                <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="inputPasswordConfirmation" class="control-label col-xs-3">새 비밀번호 확인</label>
                        <div class="col-xs-4">
                                <input type="password" class="form-control " placeholder="새 비밀번호 확인" name="password_confirmation" id="inputPasswordConfirmation">
                        </div>
                        @if ($errors->has('password'))
                        <span class="help-block">
                                {{ $errors->first('password_confirmation') }}
                        </span>
                        @endif
                </div>





        <div class='br30'></div>

        <p class="text-center">

                <a href="/" class="btn btn-default btn-lg history-back" >취소</a>
                <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">회원정보변경</button>

                <button class='btn btn-link btn-lg pull-right' id="leave" type="button"><span class=" text-danger">회원탈퇴</span></button>
        </p>
        {!! Form::close() !!}


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function(){
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
