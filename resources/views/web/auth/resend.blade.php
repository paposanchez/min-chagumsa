@extends( 'web.layouts.blank' )

@section('body-class') layout-login @endsection

@section('content')
	<div id="sub_full_wrap">


		<div class="login_box_wrap" style="padding:20px;width: 700px;margin-left: -340px;">

			<div class="text-center" style="margin:20px 0px 20px;">
				{{ Html::image('/assets/themes/v1/web/img/comm/head_logo.png') }}
			</div>

			{!! Form::open(['route' => ["register.resent"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'resendFrm']) !!}
			<input type="hidden" name="email" value="{{ $email }}" />
			<table style="width:100%;padding:0;margin:0;" cellspacing="0">
				<tbody>
				<tr>
					<td style="padding : 30px 30px 0px 30px">
						<span style="display:block;font-size:28px;color:#0b4777;letter-spacing:-1px;">회원님의 이메일 인증이 완료되지 않았습니다.</span>
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
				</tbody>
			</table>

			{!! Form::close() !!}

		</div>
	</div>

@endsection


@section( 'footer-script' )
<script type="text/javascript">
	$(function (){

	});
</script>
@endsection

