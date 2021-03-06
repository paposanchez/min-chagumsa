@extends( 'mobile.layouts.login-base' )

@section( 'content' )

    <div id='sub_full_wrap'>


        <div class='login_box_wrap'>
            {!! Form::open(['url' => 'login', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'login-form', 'autcomplete' => 'off']) !!}
            <h3>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/sub/logo_big.png")) }}</h3>

            <div class='br20'></div>
            <div class='ipt_line br10  {{ $errors->has('email') ? 'has-error' : '' }}'>
                <input type='text' name="email" class='ipt' placeholder='아이디 (이메일)'>
                @if ($errors->has('email'))
                    <span class="help-block">
                            {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class='br10'></div>
            <div class='ipt_line  {{ $errors->has('email') ? 'has-error' : '' }}'>
                <input type='password' name="password" class='ipt' placeholder='비밀번호'>
                @if ($errors->has('password'))
                    <span class="help-block">
                            {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class='br10'></div>
            <div class='ipt_line'>
                <label>
                    <input type='checkbox' class='psk' id="save_email">
                    <span class='lbl'> 아이디 저장</span>
                </label>
            </div>
            <div class='br20'></div>
            <div class='ipt_line'>
                <button class='btns btns_green' type="submit" data-loading-text="처리중...">로그인</button>
            </div>
            <div class='br10'></div>
            <div class='login_link'>
                <a href='{{ url("/agreement") }}'>회원가입</a><a href='{{ url("/password/reset") }}'>비밀번호 찾기</a>
            </div>
            {!! Form::close() !!}
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
        if(saved_email){
            $("input[name='email']").val(saved_email);
            $("#save-email").attr("checked", true);

        }

        //ID저장
        $("#save_email").on("click", function () {
            var save_chk = $(this).is(":checked");

            if(save_chk === true){
                var email = $("input[name='email']").val();
                if(email){
                    setCookie('saved_email', email, 30);
                }else{
                    //저장 안함.
                    deleteCookie('saved_email');
                }
            }
        })

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
            },
            //				errorPlacement: function(error, element) {
            //					/*
            //					 var chk_name = element.attr("name");
            //					 var checked = $("input[name="+chk_name+"]").is(":checked");
            //					 if(checked == false){
            //					 $('#'+chk_name+'-span').text(error.text()).css({'color': 'red'});
            //					 }
            //					 */
            //				},
            submitHandler: function(form){

                //cookie 저장여부 확인하여 처리함.
                if($("#save-email").is(":checked") == true){
                    var saved_email = getCookie("saved_email");
                    if(!saved_email){
                        setCookie('saved_email', $("input[name='email']").val(), 30);
                    }

                }

                form.submit();
            }
        });
    });

    var setCookie = function (cookieName, value, exdays){
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
        document.cookie = cookieName + "=" + cookieValue;
    }

    var deleteCookie = function (cookieName){
        var expireDate = new Date();
        expireDate.setDate(expireDate.getDate() - 1);
        document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
    }

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