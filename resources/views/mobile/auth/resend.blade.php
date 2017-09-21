@extends( 'mobile.layouts.login-base' )

@section( 'content' )

@section('content')

	<div id='sub_title_wrap'>회원인증</div>

	<div id='sub_wrap'>

		<div class='br20'></div>


		<h3>{{ Html::image(\App\Helpers\Helper::theme_mobile("/img/sub/logo_big.png")) }}</h3>
			<div class='pop_wrap'>
			{!! Form::open(['route' => ["mobile.register.resent"], 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form', 'id' => 'resendFrm']) !!}
			<input type="hidden" name="email" value="{{ $email }}" />

			<p style="display:block;font-size:28px;color:#0b4777;letter-spacing:-1px;" class="text-center">회원님의 이메일 인증이 완료되지 않았습니다.</p>
			<div class="br20"></div>
			<p style='font-size:14px;color:#444;letter-spacing:-1px;' class="text-center">
				차검사를 선택해주신 회원님 감사합니다!<br>
				항상 신뢰할 수 있는 서비스를 제공하기 위해 노력하겠습니다.<br>
				회원님의 계정은 활성화가 되어있지 않습니다.<br>
				아래 [인증메일 재발송 하기] 버튼을 눌러주세요.
			<div class="br10"></div>

			<div class="br40"></div>
			<div class="ipt_line wid40">
				<button class="btns btns_green" style="display:inline-block;" type="submit">
					인증메일 재발송 하기
				</button>
			</div>
			</p>



			{!! Form::close() !!}

		</div>
	</div>


@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function(){

    });

</script>

@endpush