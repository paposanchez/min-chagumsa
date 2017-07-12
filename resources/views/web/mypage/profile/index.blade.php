@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>회원정보 수정</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
		<li><a class='select' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
	</ul>

	<div class='br30'></div>

	<div class='psk_table_wrap'>
		{!! Form::open([ 'route' => ['mypage.profile.store'], 'class' =>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id' => 'user-form']) !!}
		<input type="hidden" name="id" value="{{ $profile->id }}">
		<input type="hidden" name="email" value="{{ $profile->email }}">
		<table>
			<colgroup>
				<col style='width:140px;'>
				<col style='width:800px;'>
			</colgroup>
			<tbody>
				<tr>
					<th>아이디</th>
					<td style='padding-left:25px !important;'>
						{{ $profile->email }}
					</td>
				</tr>
				<tr>
					<th>비밀번호 변경</th>
					<td>

						<div class='psk_table_wrap'>
						<table>
							<colgroup>
								<col style='width:140px;'>
								<col style='width:800px;'>
							</colgroup>
							<tbody>
								<tr>
									<th>현재 비밀번호</th>
									<td>
										<input type='password' name="old_password" class='ipt wid33' placeholder=''>{{-- <span class='ipt_msg'>8~16자리의 영문/숫자/특수문자를 두 가지 이상 조합하세요</span> --}}
									</td>
								</tr>
								<tr>
									<th>변경할 비밀번호</th>
									<td>
										<input type='password' name="password" class='ipt wid33' placeholder=''><span class='ipt_msg'></span>
									</td>
								</tr>
								<tr>
									<th>비밀번호 재입력</th>
									<td>
										<input type='password' name="password_confirmation" class='ipt wid33' placeholder=''><span class='ipt_msg'></span>
									</td>
								</tr>
								<tr>
									<th></th>
									<td>
										<button class='btns btns_skyblue' style='display:inline-block;'>비밀번호 변경</button>
									</td>
								</tr>
							</tbody>
						</table>
						</div>

					</td>
				</tr>
			</tbody>
		</table>
		{!! Form::close() !!}
	</div>

	<div class='br20'></div>
	
	<div class='my_edit_btn_wrap alg_r'>
		회원탈퇴를 원하시면 회원탈퇴 버튼을 눌러주세요. <button class='btns btns2' style='display:inline-block;'>회원탈퇴</button>
	</div>

	<div class='br30'></div>




</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
$(function(){
	$("#user-form").validate({
		debug: true,
		rules: {
		    old_password:{
		        required: true,
                minlength: 8,
                maxlength: 16,
				remote: {
		            url: "{!! URL::route("mypage.profile.chk-pwd") !!}",
					type: "post",
					data: {
		                "old_password": function(){
		                    return $(":input[name='old_password']").val();
						},
						"email": $(":input[name='email']").val(),
						"_token": "{{ csrf_token() }}"
					}
//					,dataFilter: function(data){
//		                var json = JSON.parse(data);
//		                if(json.status='error'){
//		                    return json.message;
//						}else{
//		                    return success;
//						}
//					}
				}
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
		    old_password: {
		        required: "현재 사용중인 비밀번호를 입력해 주세요.....",
				old_password: "비밀번호는 8~16자리의 영문/숫자/특수문자 입니다.",
				remote: "현재 비밀번호와 입력된 비밀번호가 다릅니다."
			},
            password: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",
            password_confirmation: "입력된 비밀번호 확인값이 틀립니다."
		},
		submitHandler: function(form){

		    if($(":input[name='old_password']").val() == $(":input[name='password']").val()){
		        //todo 메세지 수정해야 함.
		        alert('현재 비밀번호와 변경할 비밀번호가 동일합니다.');
		        $(":input[name='password']").select();
		        $(":input[name='password_confirmation']").val('');
		        return false;
			}

		    form.submit();
		}
	});
});
</script>


@endpush
