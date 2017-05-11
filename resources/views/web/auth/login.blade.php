@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_full_wrap'>

	<div class='login_box_wrap'>

		<h3><img src='../img/sub/logo_big.png'></h3>
		<div class='br30'></div>
		<div class='ipt_line br10'>
			<input type='text' class='ipt' placeholder='아이디 (이메일)'>
		</div>
		<div class='br10'></div>
		<div class='ipt_line'>
			<input type='password' class='ipt' placeholder='비밀번호'>
		</div>
		<div class='br10'></div>
		<div class='ipt_line'>
			<label>
				<input type='checkbox' class='psk'>
				<span class='lbl'> 아이디 저장</span>
			</label>
		</div>
		<div class='br20'></div>
		<div class='ipt_line'>
			<button class='btns btns_green'>로그인</button>
		</div>
		<div class='br20'></div>
		<div class='login_link'>
			<a href='{{ route('register') }}'>회원가입</a><a href=''>비밀번호 찾기</a>
		</div>
	</div>


</div>
@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
