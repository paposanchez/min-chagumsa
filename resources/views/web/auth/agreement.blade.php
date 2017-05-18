@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>회원가입<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>회원가입</span></div></h2></div>

<div id='sub_wrap'>


	<div class='join_wrap'>

		<ul class='join_step'>
			<li class='on'>
				<strong>01</strong>
				<span>약관동의</span>
			</li>
			<li>
				<strong>02</strong>
				<span>회원정보입력</span>
			</li>
			<li>
				<strong>03</strong>
				<span>회원가입완료</span>
			</li>
		</ul>

		<div class='br30'></div>
		<div class='br20'></div>

		{!! Form::open(['url' => route('register.join'), 'class' =>'form-horizontal', 'method' => 'post', 'role' => 'form']) !!}
		<div class='join_term_wrap'>
			<label>이용약관</label>
			<div class='term_area'>
				<div class='term_cont'>
					@include( 'web.partials.agreement.usage' )
				</div>
			</div>
			<div class='ipt_line'>
				<label>
					<input type='checkbox' class='psk' name="term_use">
					<span class='lbl'> 이용약관에 동의합니다.</span>
				</label>
			</div>
		</div>

		<div class='br20'></div>
		<div class='br20'></div>

		<div class='join_term_wrap'>
			<label>개인정보 수집/이용에 대한 안내</label>
			<div class='term_area'>
				<div class='term_cont'>
					@include( 'web.partials.agreement.privacy' )
				</div>
			</div>
			<div class='ipt_line'>
				<label>
					<input type='checkbox' class='psk' name="term_info">
					<span class='lbl'> 개인정보 수집/이용에 동의합니다.</span>
				</label>
			</div>
		</div>

		<div class='br30'></div>
		<div class='br30'></div>

		<div class='ipt_line wid45'>
			<button class='btns btns_blue wid45' type="button" id="disagree" style='display:inline-block;'>동의하지 않음</button>&nbsp;&nbsp; <button type="submit" class='btns btns_green wid45' style='display:inline-block;'>동의</button>
		</div>
    	{!! Form::close() !!}

	</div>


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
	$(function () {
        $("form").validate({
            rules: {
                term_use: "required",
                term_info: "required"
    		},
			messages: {
				term_use: "이용약관 동의를 체크해주세요.",
				term_info: "개인정보 수집/이용 동의를 체크해 주세요."
			},
			submitHandler: function(form){
				form.submit();
			}
    	});
    });
</script>
@endpush
