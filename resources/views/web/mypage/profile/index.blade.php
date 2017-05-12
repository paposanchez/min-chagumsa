@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>마이페이지<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 마이페이지 <i class="fa fa-angle-right"></i> <span>회원정보 수정</span></div></h2></div>

<div id='sub_wrap'>

	<ul class='menu_tab_wrap'>
		<li><a class='' href=''>주문목록</a></li>
		<li><a class='select' href=''>회원정보 수정</a></li>
	</ul>

	<div class='br30'></div>

	<div class='psk_table_wrap'>
	<table>
		<colgroup>
			<col style='width:140px;'>
			<col style='width:800px;'>
		</colgroup>
		<tbody>
			<tr>
				<th>아이디</th>
				<td style='padding-left:25px !important;'>
					user01@gmail.com
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
									<input type='password' class='ipt wid33' placeholder=''><span class='ipt_msg'>8~16자리의 영문/숫자/특수문자를 두 가지 이상 조합하세요</span>
								</td>
							</tr>
							<tr>
								<th>변경할 비밀번호</th>
								<td>
									<input type='password' class='ipt wid33' placeholder=''><span class='ipt_msg'></span>
								</td>
							</tr>
							<tr>
								<th>비밀번호 재입력</th>
								<td>
									<input type='password' class='ipt wid33' placeholder=''><span class='ipt_msg'></span>
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
	</div>

	<div class='br20'></div>
	
	<div class='my_edit_btn_wrap alg_r'>
		회원탈퇴를 원하시면 회원탈퇴 버튼을 눌러주세요. <button class='btns btns2' style='display:inline-block;'>회원탈퇴</button>
	</div>

	<div class='br30'></div>




</div>

<!-- ──────────────────────
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
