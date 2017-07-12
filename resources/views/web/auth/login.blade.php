@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_full_wrap'>

	<div class='login_box_wrap'>

		{{--{!! Form::open(['method' => 'POST','route' => ['login'], 'enctype'=>"multipart/form-data", 'id' => "login-form"]) !!}--}}
		{!! Form::open(['url' => 'login', 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
		<h3>{{ Html::image(Helper::theme_web( '/img/sub/logo_big.png')) }}</h3>
		<div class='br30'></div>
		<div class='ipt_line br10'>
			<input name="email" type='text' class='ipt' placeholder='아이디 (이메일)'>
		</div>
		<div class='br10'></div>
		<div class='ipt_line'>
			<input name="password" type='password' class='ipt' placeholder='비밀번호'>
		</div>
		<div class='br10'></div>
		<div class='ipt_line'>
			<label>
				<input type='checkbox' class='psk' id="save-email">
				<span class='lbl'> 아이디 저장</span>
			</label>
		</div>
		<div class='br20'></div>
		<div class='ipt_line'>
			<button type="submit" class='btns btns_green'>로그인</button>
		</div>
		<div class='br20'></div>
		<div class='login_link'>
			<a href='{{ route('register') }}'>회원가입</a><a href=''>비밀번호 찾기</a>
		</div>

		{!! Form::close() !!}
	</div>


</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
	<script type="text/javascript">
		$(function(){

		    //save email
			var saved_email = getCookie("saved_email");

			if(saved_email){
			    $("input[name='email']").val(saved_email);
			    $("#save-email").attr("checked", true);

			}

            $("#save-email").on("click", function(obj){
                var checked = $(this).is(":checked");

                if(checked == true){
                    //저장
					var email = $("input[name='email']").val();
					if(email){
					    setCookie('saved_email', email, 30);
					}
				}else{
                    //저장 안함.
					deleteCookie('saved_email');
				}
			});


		    //form validation
            $("#login-form").validate({
                rules: {
                    email: {
                        required: true,
						email: true
					},
					password: {
                        required: true,
                        minlength: 8,
						maxlength: 16
					}
        		},
				messages: {
					email: "정확한 이메일 주소를 입력해 주세요.",
					password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)"
				},
				errorPlacement: function(error, element) {
					/*
					 var chk_name = element.attr("name");
					 var checked = $("input[name="+chk_name+"]").is(":checked");
					 if(checked == false){
					 $('#'+chk_name+'-span').text(error.text()).css({'color': 'red'});
					 }
					 */
				},
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
