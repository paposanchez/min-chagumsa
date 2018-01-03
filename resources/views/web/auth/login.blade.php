@extends( 'web.layouts.default' )


@section( 'content' )

<section id="content" class="content-alt">

        <div class="container">

                <div class="row">

                        <div class="col-md-6 col-md-offset-3">

                                <div class="card">
                                        <div class="card-header text-center">
                                                {{ Html::image('/assets/img/logo.png') }}
                                        </div>

                                        <div class="card-body card-padding">


                                                {!! Form::open(['url' => 'login', 'class' =>'form', 'method' => 'post', 'role' => 'form', 'id' => 'login-form']) !!}


                                                <div class="form-group fg-float {{ $errors->has('email') ? 'has-error  has-feedback' : '' }}">
                                                        <div class="fg-line">
                                                                <input type="email" class="form-control input-lg fg-input" name="email" id="inputEmail">
                                                                <label class="fg-label">{{ trans('web/register.email') }}</label>
                                                        </div>


                                                        @if ($errors->has('email'))
                                                        <span class="zmdi zmdi-close form-control-feedback"></span>
                                                        @endif

                                                </div>

                                                <div class="form-group fg-float {{ $errors->has('password') ? 'has-error  has-feedback' : '' }}">
                                                        <div class="fg-line">
                                                                <input type="password" class="form-control input-lg fg-input" name="password" id="inputPassword">
                                                                <label class="fg-label">{{ trans('web/register.password') }}</label>
                                                        </div>

                                                        @if ($errors->has('password'))
                                                        <span class="zmdi zmdi-close form-control-feedback"></span>
                                                        @endif
                                                </div>




                                                <button class="btn btn-block btn-lg btn-success" data-loading-text="처리중..." type="submit">
                                                        로그인
                                                </button>


                                                <hr>

                                                <p class="text-center">
                                                        로그인 진행 시 차검사의 <a href="">개인정보 수집/이용</a>에 동의하신 것으로 확인합니다
                                                </p>



                                <!-- <hr> -->


                                <!-- <a href='{{ route('register.agreement') }}' class="btn btn-block btn-lg btn-primary" data-loading-text="처리중..." type="submit">
                                회원가입
                        </a>
                        <a href='{{ route('password.request') }}' class="btn btn-block btn-lg btn-info" data-loading-text="처리중..." type="submit">
                        비밀번호리셋
                </a> -->


                {!! Form::close() !!}

        </div>
</div>
</div>
</div>
</div>
</section>
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
