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
			<li class='on link'>
				<strong>02</strong>
				<span>회원정보입력</span>
			</li>
			<li class='on'>
				<strong>03</strong>
				<span>회원가입완료</span>
			</li>
		</ul>

		<div class='br30'></div>
		<div class='br20'></div>

		<h3>이메일 인증을 해주세요.<br>인증 완료 후에 카검사를 이용하실 수 있습니다.</h3>

		<div class='br30'></div>

		<div class='psk_table_wrap'>
			<table style="width: 50%;margin: auto;">
				<colgroup>
					<col style='width:50%;'>
					<col style='width:50px;'>
				</colgroup>
				<tbody>
				<tr>
					<th>이메일</th>
					<td>
						<span>
							{{ $user->email }}
						</span>
					</td>
				</tr>
				</tbody>
			</table>
		</div>

		<div class='br20'></div>

		<div class='ipt_line ipt_guide' style='width:400px;'>
			<span>입력하신 이메일로 인증메일이 발송되었습니다.
			메일을 확인하시고 [이메일 인증하기] 버튼을 눌러주시면 인증이 완료됩니다.<br><br>
			인증메일을 받지 못하셨나요?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=''>인증메일 재발송 ></a>
			</span>
		</div>

		<div class='br30'></div>

		<div class='ipt_line wid20'>
			<a href="/" class='btns btns_green' style='display:inline-block;'>홈으로 이동</a>
		</div>

	</div>


</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
