@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
	<div class="br40"></div>
	<div style="position: absolute;left: 50%;margin-left: -300px;top: 50%;transform: translateY(-55%);">
		{!! Form::open(['route' => ["register.resent"], 'method' => 'post', 'role' => 'form', 'id' => 'resendFrm']) !!}
		<input type="hidden" name="email" value="{{ $email }}" />
		<table style="width:100%;padding:0;margin:0;" cellspacing="0">
			<tbody>
			<tr>
				<td>
					<a href="/">
					{{ Html::image(Helper::theme_web( '/img/mail/mail_logo.png')) }}
					</a>
				</td>
			</tr>
			<tr>
				<td style="background:#f4f4f4;padding:50px 60px;">
					<span style="display:block;font-size:28px;color:#0b4777;letter-spacing:-1px;">회원님의 이메일을 활성화시켜주세요.</span>
					<div class="br20"></div>
					<p style='font-size:14px;color:#444;letter-spacing:-1px;'>
						차검사를 선택해주신 회원님 감사합니다!<br>
						항상 신뢰할 수 있는 서비스를 제공하기 위해 노력하겠습니다.<br>
						회원님의 계정은 활성화가 되어있지 않습니다.
					<div class="br10"></div>
					아래 [인증메일 재발송 하기] 버튼을 눌러주세요.
					<div class="br40"></div>
					<div class="ipt_line wid40">
						<button class="btns btns_green" style="display:inline-block;" type="submit">
							인증메일 재발송 하기
						</button>
					</div>
					</p>
				</td>
			</tr>
			<tr>
				<td style="background:#f4f4f4;border-top:1px solid #dbdbdb;padding:15px 60px;">
					<p style='font-size:14px;color:#444;letter-spacing:-1px;'>
						Copyright &copy JIMBROS Co., Ltd. All rights reserved.
					</p>
				</td>
			</tr>
			</tbody>
		</table>
		{!! Form::close() !!}
	</div>
	<div class="br40"></div>

@endsection


@section( 'footer-script' )
<script type="text/javascript">
	$(function (){

	});
</script>
@endsection

