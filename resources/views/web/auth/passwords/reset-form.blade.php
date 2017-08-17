@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

<div id='sub_full_wrap'>
    <div class='login_box_wrap'>
        {!! Form::open(['url' => 'password/reset', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}
        <h3>비밀번호 찾기</h3>
        <h4>회원가입시 사용한 아이디(이메일)를 입력하세요.</h4>

        <div class='br20'></div>

        <div class='ipt_line has-error'>
            <input type='text' class='ipt' id="email" name="email" placeholder='변경할 비밀번호'>
        </div>
        <div class='br10'></div>
        <div class='ipt_line has-error'>
            <input type='text' class='ipt' id="password" name="password" placeholder='변경할 비밀번호'>
        </div>
        <div class='br10'></div>
        <div class='ipt_line has-error'>
            <input type='text' class='ipt' id="password_confirmation" name="password_confirmation" placeholder='비밀번호 확인'>
        </div>
        <div class='br20'></div>

        <div class='ipt_line'>
            <button class='btns btns_green' type="submit" id="send">확인</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>


{{--<div class="container">--}}

    {{--<div class="row">--}}

        {{--<div class="col-sm-4 col-sm-offset-4">--}}


            {{--<div class="tile tile-transparent shadow" style="margin-top:25%;">--}}

                {{--<div class="tile-row">--}}
                    {{--<div class="tile-col text-center">--}}
                        {{--<h3 class="text-muted">{{ trans("passwords.title") }}</h3>--}}
                        {{--<p class="text-muted">{{ trans("passwords.desc") }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--{!! Form::open(['url' => 'password/reset', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'form']) !!}--}}
                {{--<input type="hidden" name="token" value="{{ $token }}"/>--}}
                {{--<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">--}}
                    {{--<label for="email" class="control-label">{{ trans("passwords.email") }}</label>--}}


                    {{--<div class="">--}}
                        {{--<input id="email" type="email" class="form-control" name="email"--}}
                               {{--value="{{ $email or old('email') }}"--}}
                               {{--autofocus>--}}

                        {{--@if ($errors->has('email'))--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">--}}
                    {{--<label for="password" class="control-label">비밀번호</label>--}}

                    {{--<div class="">--}}
                        {{--<input id="password" type="password" class="form-control" name="password">--}}

                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('password') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                    {{--<label for="password-confirm" class="control-label">비밀번호확인</label>--}}
                    {{--<div class="">--}}
                        {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

                        {{--@if ($errors->has('password_confirmation'))--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}

                    {{--<button class="btn btn-block btn-primary" data-loading-text="처리중..." type="submit">패스워드 변경</button>--}}

                {{--</div>--}}

                {{--{!! Form::close() !!}--}}


            {{--</div>--}}

        {{--</div>--}}

    {{--</div>--}}
{{--</div>--}}
@endsection


@push( 'footer-script' )
<script type="text/javascript">
    $(function () {
        $("#form").validate({
            debug: true,
            rules: {
                email:{
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
            messages:{
                email : "사용자의 이메일을 입력해주세요.",
                password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
                password_confirmation: "입력된 비밀번호 확인값이 틀립니다."
            },
            submitHandler: function(form){
                form.submit();
            }
        });
    });
</script>
@endpush
