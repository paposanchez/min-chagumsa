@extends( 'web.layouts.blank' )


@section( 'content' )

    <div id="sub_full_wrap">


        <div class="login_box_wrap" style="padding:20px;">

            <div class="text-center" style="margin:20px 0px 20px;">
                {{ Html::image('/assets/themes/v1/web/img/comm/head_logo.png') }}
                <h3>로그인</h3>
            </div>


            {!! Form::open(['url' => 'login', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'login-form']) !!}

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="inputEmail" class="control-label sr-only">{{ trans('web/register.email') }}</label>
                <input type="email" class="form-control  input-lg" placeholder="{{ trans('web/register.email') }}"
                       name="email" id="inputEmail">

                @if ($errors->has('email'))
                    <span class="help-block">
                            {{ $errors->first('email') }}
                    </span>
                @endif
            </div>


            <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="inputPassword" class="control-label sr-only">{{ trans('web/register.password') }}</label>
                <input type="password" class="form-control  input-lg" placeholder="{{ trans('web/register.password') }}"
                       name="password" id="inputPassword">

                @if ($errors->has('password'))
                    <span class="help-block">
                            {{ $errors->first('password') }}
                    </span>
                @endif
            </div>

            <p class="text-center">
                <button class="btn btn-block btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">
                    로그인
                </button>
            </p>

            <hr>

            <div class='login_link'>
                <a href='{{ route('register.agreement') }}'>회원가입</a>
                <a href='/password/reset'>{{ trans("passwords.title") }}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    </div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
    <script type="text/javascript">
        $(function () {

            //save email
            var saved_email = getCookie("saved_email");

            if (saved_email) {
                $("input[name='email']").val(saved_email);
                $("#save-email").attr("checked", true);

            }

            $("#save-email").on("click", function (obj) {
                var checked = $(this).is(":checked");

                if (checked == true) {
                    //저장
                    var email = $("input[name='email']").val();
                    if (email) {
                        setCookie('saved_email', email, 30);
                    }
                } else {
                    //저장 안함.
                    deleteCookie('saved_email');
                }
            });


            //form validation
            $("#login-form").validate({
                debug: true,
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 7,
                        maxlength: 16
                    }
                },
                messages: {
                    email: "정확한 이메일 주소를 입력해 주세요.",
                    password: "비밀번호를 확인하세요.(7~16 자리의 영문/숫자/특수문자)"
                }
                submitHandler: function (form) {

                    //cookie 저장여부 확인하여 처리함.
                    if ($("#save-email").is(":checked") == true) {
                        var saved_email = getCookie("saved_email");
                        if (!saved_email) {
                            setCookie('saved_email', $("input[name='email']").val(), 30);
                        }

                    }

                    form.submit();
                }
            });
        });

        var setCookie = function (cookieName, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
            document.cookie = cookieName + "=" + cookieValue;
        };

        var deleteCookie = function (cookieName) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() - 1);
            document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
        };

        var getCookie = function (cookieName) {
            cookieName = cookieName + '=';
            var cookieData = document.cookie;
            var start = cookieData.indexOf(cookieName);
            var cookieValue = '';
            if (start != -1) {
                start += cookieName.length;
                var end = cookieData.indexOf(';', start);
                if (end == -1) end = cookieData.length;
                cookieValue = cookieData.substring(start, end);
            }
            return unescape(cookieValue);
        }
    </script>
@endpush
