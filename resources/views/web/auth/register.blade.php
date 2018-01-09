@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
<div class="login-content">

        <!-- Login -->
        <div class="lc-block lc-block-alt toggled" id="l-login">

                <div class="lcb-form">
                        {!! Form::open(['route' => 'register', 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id'=>'login-form']) !!}

                        <h3 class="m-b-25 text-light">차검사 <strong>{{ trans("register.title") }}</strong></h3>
                        <p class="text-muted">{{ trans("register.desc") }}</p>

                        <div role="tabpanel">
                                <ul class="tab-nav" role="tablist">
                                        <li class="active"><a href="#home11" aria-controls="home11" role="tab" data-toggle="tab">이용약관</a></li>
                                        <li><a href="#profile11" aria-controls="profile11" role="tab" data-toggle="tab">개인정보 수집/이용</a>
                                        </li>
                                </ul>

                                <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active text-left" id="home11" style="max-height:200px;overflow:scroll">
                                                @include( 'web.partials.agreement.usage' )
                                        </div>
                                        <div role="tabpanel" class="tab-pane text-left" id="profile11" style="max-height:200px;overflow:scroll">
                                                @include( 'web.partials.agreement.privacy' )
                                        </div>

                                </div>
                        </div>


                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                                <input type="email" class="form-control" placeholder="{{ trans('register.email') }}" name="email" id="inputEmail">
                                        </div>
                                </div>

                                @if ($errors->has('email'))
                                <small class="help-block">이메일을 확인하세요.</small>
                                @endif
                        </div>


                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <div class="fg-line">
                                                <input type="text" class="form-control" placeholder="{{ trans('register.name') }}" name="name" id="inputEmail">
                                        </div>
                                </div>

                                @if ($errors->has('name'))
                                <small class="help-block">{{ $errors->first('name') }}</small>
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

                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                        <div class="fg-line">
                                                <input type="password" class="form-control" placeholder="{{ trans('register.password_confirmation') }}" name="password_confirmation" id="inputPassword">
                                        </div>
                                </div>

                                @if ($errors->has('password_confirmation'))
                                <small class="help-block">비밀번호를 확인하세요.</small>
                                @endif
                        </div>


                        <!-- <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <div class="fg-line">
                                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="green">
                                                        <label for="ts4" class="ts-label">약관에 동의합니다.</label>
                                                        <input id="ts4" type="checkbox" hidden="hidden">
                                                        <label for="ts4" class="ts-helper"></label>
                                                    </div>
                                        </div>
                                </div>

                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <div class="input-group">
                                        <div class="fg-line">
                                                    <div class="toggle-switch toggle-switch-demo" data-ts-color="green">
                                                        <label for="ts1" class="ts-label">약관에 동의합니다.</label>
                                                        <input id="ts1" type="checkbox" hidden="hidden">
                                                        <label for="ts1" class="ts-helper"></label>
                                                    </div>
                                        </div>
                                </div>

                        </div> -->






                        <p class="text-center">
                                <button data-loading-text="처리중..." type="submit" class="btn btn-success  btn-block btn-lg" >회원가입</button>
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
