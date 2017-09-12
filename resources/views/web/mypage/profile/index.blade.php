@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>회원정보 수정</span></div></h2></div>

<div id='sub_wrap'>

        <ul class='menu_tab_wrap'>
                <li><a class='' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
                <li><a class='select' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
        </ul>

        <div class='br30'></div>

        <div class='order-container' style="width:50%;margin:0 auto;">

                {!! Form::open([ 'route' => ['mypage.profile.store'], 'class' =>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id' => 'user-form']) !!}

                <div class="form-group ">
                        <label for="">회원정보</label>


                        <div class="block">

                                <div class="form-group">
                                        <label for="">{{ trans('web/register.email') }}</label>

                                        <p class="text-lg form-control-static">{{ $profile->email }}</p>
                                </div>


                                <div class="form-group  no-margin form-group-lg {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="" class="control-label">{{ trans('web/register.name') }}</label>
                                        <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control " value="{{ $profile->name }}" placeholder="{{ trans('web/register.name') }}" name="name" id="inputName">
                                        </div>

                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                                {{ $errors->first('name') }}
                                        </span>
                                        @endif

                                </div>

                        </div>
                </div>



                <div class="form-group ">
                        <label for="">비밀번호 변경</label>

                        <div class="block">
                                <div class="form-group  form-group-lg {{ $errors->has('old_password') ? 'has-error' : '' }}">
                                        <label for="inputPasswordConfirmation" class="control-label">현재 비밀번호</label>
                                        <input type='password' name="old_password" class='form-control ' placeholder='현재 비밀번호'>
                                        @if ($errors->has('old_password'))
                                        <span class="help-block">
                                                {{ $errors->first('old_password') }}
                                        </span>
                                        @endif
                                </div>


                                <div class="form-group  form-group-lg {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="inputPassword" class="control-label">새 비밀번호</label>
                                        <input type="password" class="form-control " placeholder="새 비밀번호" name="password" id="inputPassword">

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                                {{ $errors->first('password') }}
                                        </span>
                                        @endif
                                </div>

                                <div class="form-group  no-margin form-group-lg {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                        <label for="inputPasswordConfirmation" class="control-label">새 비밀번호 확인</label>
                                        <input type="password" class="form-control " placeholder="새 비밀번호 확인" name="password_confirmation" id="inputPasswordConfirmation">

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                                {{ $errors->first('password_confirmation') }}
                                        </span>
                                        @endif
                                </div>
                        </div>
                </div>


                <p class="text-center">

                        <a href="/" class="btn btn-default btn-lg history-back" >취소</a>
                        <button class="btn btn-lg btn-success" data-loading-text="처리중..." type="submit">회원정보변경</button>

                        <button class='btn btn-link btn-lg pull-right' id="leave" type="button"><span class=" text-danger">회원탈퇴</span></button>
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
        $("#user-form").validate({
                rules: {
                        name:{
                                required: true
                        },
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
                        name: "이름을 입력하세요.",
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
