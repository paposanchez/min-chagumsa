@extends( 'web.layouts.blank' )
@section( 'content' )

<!-- <div id='sub_title_wrap'><h2>회원가입<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>회원가입</span></div></h2></div> -->

<div id="sub_full_wrap">
        <div class="login_box_wrap" style="padding:20px;">

                <div class="text-center" style="margin:20px 0px 20px;">
                          {{ Html::image('/assets/themes/v1/web/img/comm/head_logo.png') }}
                        <h3>회원가입완료</h3>

                </div>

                <h4 class="text-danger" style="margin:30px 0px; font-size:18px;color:#ff6600;">
                        {{ $user->email }}
                </h4>


                <div class='ipt_line ipt_guide text-justify' style="margin:25px 0px;">
			입력하신 이메일로 인증메일이 발송되었습니다.
			메일을 확인하시고 [이메일 인증하기] 버튼을 눌러주시면 인증이 완료됩니다.

		</div>
                <!-- <div class='ipt_line ipt_guide' style="margin:25px 0px;">
			인증메일을 받지 못하셨나요? <a href='' style="color: #ff6600 !important;">인증메일 재발송하기</a>
		</div> -->


                <p class="text-center">
                        <a href="/" class='btn btn-lg btn-success  btns_green' style='display:inline-block;'>홈으로 이동</a>
                </p>



        </div>


</div>

@endsection


@push( 'header-script' )
@endpush

@push( 'footer-script' )
@endpush
