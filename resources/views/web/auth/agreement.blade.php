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





		{!! Form::open(['method' => 'GET','route' => ['register'], 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data", "autocomplete" => "off", 'role' => 'form', 'id'=>'join-form']) !!}

        <div style="width:600px; padding:20px; background:#fff; margin:0 auto; border:solid 1px #efefef;" class="">

          <!--   <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="inputEmail" class="control-label">{{ trans('web/register.email') }}</label>
                <input type="email" class="form-control  input-lg" placeholder="{{ trans('web/register.email') }}" name="email" id="inputEmail">

                @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
                @endif
            </div> -->


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
					<span class='lbl' id="term_use-span"> 이용약관에 동의합니다.</span>
					<div id='errorContainer'></div>
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
					<span class='lbl' id="term_info-span"> 개인정보 수집/이용에 동의합니다.</span>
				</label>
			</div>
		</div>

		</div>

	
         <div class='br30'></div>

            <p class="text-center">

                <button class="btn btn-lg btn-success btns_green" data-loading-text="처리중..." type="submit">동의합니다</button>

            </p>
            {!! Form::close() !!}



	</div>


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
	$(function () {
        $("#join-form").validate({
//			debug: true,
            rules: {
                term_use: "required",
                term_info: "required"
    		},
			messages: {
				term_use: "이용약관 동의를 체크해주세요.",
				term_info: "개인정보 수집/이용 동의를 체크해 주세요."
			},
            errorPlacement: function(error, element) {
			    var chk_name = element.attr("name");
			    var checked = $("input[name="+chk_name+"]").is(":checked");
			    if(checked == false){
                    $('#'+chk_name+'-span').text(error.text()).css({'color': 'red'});
				}

            },
			submitHandler: function(form){
				form.submit();
			}
    	});
    });
</script>
@endpush
