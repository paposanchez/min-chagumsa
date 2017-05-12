@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')

<div id='sub_title_wrap'><h2>회원가입<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>회원가입</span></div></h2></div>

<div id='sub_wrap'>


	<div class='join_wrap'>

		<h3>환영합니다! 이메일 인증이 완료되었습니다.</h3>

		<div class='br20'></div>
		
		<dl class='simple_info'>
			<dt>이메일</dt>
			<dd>user01@gmail.com</dd>
		</dl>

		<div class='br10'></div>

		<div class='ipt_line ipt_guide alg_c' style='width:400px;'>
			<span>지금 바로 카검사 서비스를 이용할 수 있습니다</span>
		</div>

		<div class='br30'></div>

		<div class='ipt_line wid33'>
			<button class='btns btns_green' style='display:inline-block;'>로그인하러 가기</button>
		</div>

	</div>


</div>


@endsection

@section( 'footer-script' )
<script type="text/javascript">
</script>
@endsection
