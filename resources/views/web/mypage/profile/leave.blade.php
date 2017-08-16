@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>회원정보 수정</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='' href='{{ route('mypage.order.index') }}'>주문목록</a></li>
		<li><a class='select' href='{{ route('mypage.profile.index') }}'>회원정보 수정</a></li>
	</ul>

	<div class='br30'></div>
	<h3>회원님 !! 정말 탈퇴하시겠습니까 ?</h3>
	<div class='br30'></div>

	<div class='psk_table_wrap'>
		{!! Form::open([ 'route' => ['mypage.profile.leave'], 'class' =>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id' => 'user-form']) !!}
		<input type="hidden" name="id" value="{{ $profile->id }}">
		<input type="hidden" name="email" value="{{ $profile->email }}">
		<table>
			<colgroup>
				<col style='width:140px;'>
				<col style='width:800px;'>
			</colgroup>



			<tbody>
			@if($profile->status_cd != 1)
				<tr>
					<td colspan="2">
						<h3>회원님의 계정은 현재 비활성화 상태입니다.</h3>
						<p class="text-center"><button type="button" class="btns btns_skyblue" id="email-resend">회원 활성화 인증메일 보내기</button></p>
					</td>
				</tr>
			@endif
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
							<h4>회원탈퇴를 계속 진행하시려면, 비밀번호를 입력해주세요.</h4>
							<div class="br10"/>
								<tr>
									<th>현재 비밀번호</th>
									<td>
										<input type='password' name="password1" class='ipt wid33' placeholder=''>{{-- <span class='ipt_msg'>8~16자리의 영문/숫자/특수문자를 두 가지 이상 조합하세요</span> --}}
									</td>
								</tr>
								<tr>
									<th>비밀번호 확인</th>
									<td>
										<input type='password' name="password2" class='ipt wid33' placeholder=''><span class='ipt_msg'></span>
									</td>
								</tr>
								<tr>
									<th></th>
									<td>
										<button class='btns btns_skyblue' style='display:inline-block;'>회원 탈퇴</button>
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
	<div class='br30'></div>
</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
{{--$(function(){--}}
	{{--$("#user-form").validate({--}}
		{{--debug: true,--}}
		{{--rules: {--}}
		    {{--password1:{--}}
		        {{--required: true,--}}
                {{--minlength: 8,--}}
                {{--maxlength: 16,--}}
				{{--remote: {--}}
		            {{--url: "{!! URL::route("mypage.profile.chk-pwd") !!}",--}}
					{{--type: "post",--}}
					{{--data: {--}}
		                {{--"password1": function(){--}}
		                    {{--return $(":input[name='password1']").val();--}}
						{{--},--}}
						{{--"email": $(":input[name='email']").val(),--}}
						{{--"_token": "{{ csrf_token() }}"--}}
					{{--}--}}
					{{--,dataFilter: function(data){--}}
		                {{--var json = JSON.parse(data);--}}
		                {{--if(json.status='error'){--}}
		                    {{--return json.message;--}}
						{{--}else{--}}
		                    {{--return success;--}}
						{{--}--}}
					{{--}--}}
				{{--}--}}
			{{--},--}}
            {{--password2: {--}}
                {{--required: true,--}}
                {{--minlength: 8,--}}
                {{--maxlength: 16--}}
            {{--},--}}
{{--//            password_confirmation: {--}}
{{--//                minlength: 8,--}}
{{--//                maxlength: 16,--}}
{{--//                equalTo: "[name='password']"--}}
{{--//            },--}}
		{{--},--}}
		{{--messages:{--}}
		    {{--password1: {--}}
		        {{--required: "현재 사용중인 비밀번호를 입력해 주세요.",--}}
				{{--password1: "비밀번호는 8~16자리의 영문/숫자/특수문자 입니다.",--}}
				{{--remote: "현재 비밀번호와 입력된 비밀번호가 다릅니다."--}}
			{{--},--}}
            {{--password2: "비밀번호를 확인하세요.(8~16 자리의 영문/숫자/특수문자)",--}}
		{{--},--}}
		{{--submitHandler: function(form){--}}

		    {{--if($(":input[name='password1']").val() == $(":input[name='password2']").val()){--}}
		        {{--//todo 메세지 수정해야 함.--}}
		        {{--alert('현재 비밀번호와 변경할 비밀번호가 동일합니다.');--}}
		        {{--$(":input[name='password']").select();--}}
		        {{--$(":input[name='password_confirmation']").val('');--}}
		        {{--return false;--}}
			{{--}--}}

		    {{--form.submit();--}}
		{{--}--}}
	{{--});--}}

{{--});--}}
</script>


@endpush
