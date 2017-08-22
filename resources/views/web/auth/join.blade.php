@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>회원가입<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>회원가입</span></div></h2></div>

<div id='sub_wrap'>


    <div class='join_wrap'>

        <ul class='join_step'>
            <li class='on link'>
                <strong>01</strong>
                <span>약관동의</span>
            </li>
            <li class='on'>
                <strong>02</strong>
                <span>회원정보입력</span>
            </li>
            <li>
                <strong>03</strong>
                <span>회원가입완료</span>
            </li>
        </ul>

        <div class='br30'></div>
        <div class='br20'></div>



            {!! Form::open(['route' => ['register'], 'id' => 'register-form', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}

        <div style="width:600px; padding:20px; background:#fff; margin:0 auto; border:solid 1px #efefef;" class="">

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="inputEmail" class="control-label">{{ trans('web/register.email') }}</label>
                <input type="email" class="form-control  input-lg" placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail">

                @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
                @endif
            </div>

            <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="inputName" class="control-label">{{ trans('web/register.name') }}</label>
                <input type="text" class="form-control  input-lg" placeholder="{{ trans('web/register.name') }}" name="name" id="inputName">

                @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
                @endif
            </div>


            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="inputPassword" class="control-label">{{ trans('web/register.password') }}</label>
                <input type="password" class="form-control  input-lg" placeholder="{{ trans('web/register.password') }}" name="password" id="inputPassword">

                @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
                @endif
            </div>

            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="inputPasswordConfirmation" class="control-label">{{ trans('web/register.confirm-password') }}</label>
                <input type="password" class="form-control  input-lg" placeholder="{{ trans('web/register.confirm-password') }}" name="password_confirmation" id="inputPasswordConfirmation">

                @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password_confirmation') }}
                </span>
                @endif
            </div>

 </div>
     

         <div class='br30'></div>

            <p class="text-center">

                <a href="/login" class="btn btn-default btn-lg history-back" >취소</a>
                <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">회원가입</button>

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
        debug: true,
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
                equalTo: "[name='password']"
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/verify",
                    type: "get",
                    data: {
                        "email": function () {
                            return $(":input[name='email']").val();
                        }
                    },
                }
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
        },

        submitHandler: function(form){
            form.submit();
        }
    });
});

</script>

@endpush
