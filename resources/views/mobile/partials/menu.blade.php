<div id='navi_wrap'>
    <div id='navi_cont'>
        <a class='navi_close'>차검사 서비스</a>
        <div class='menu_wrap'>
            <div class='menu_inner'>

                <div class='menu_head'>
                    <!-- 로그인 전 -->
                    @if(!Auth::user()->id)
                        <div class='menu_head_btn type2'><button class='btns btns_skyblue btn_sdw'>로그인 하기</button></div>
                    @else
                        <div class='menu_head_profile'>
                            <span>{{ Auth::user()->email }}</span>
                            <a class='profile_setting' href="{{ url("/mypage/profile") }}"><i class="fa fa-cog"></i></a>
                        </div>
                        <div class='menu_head_btn'><button class='btns btns_skyblue btn_sdw' data-url="{{ url("/mypage/order") }}">주문목록</button></div>
                @endif
                <!-- 로그인 후 -->
                </div>
                <ul class='menu_list'>
                    <li><a class='sub_menu menu1'>카검사 소개</a>
                        <div>
                            <a class='' href='{{ url("/information/index") }}'>서비스 소개</a>
                            <a class='' href='{{ url("/information/certificate") }}'>카검사인증서란?</a>
                            <a class='' href='{{ url("/information/guide") }}'>특징 및 절차</a>
                            <a class='' href='{{ url("/information/price") }}'>신청절차 및 수수류</a>
                        </div>
                    </li>
                    <li><a class='menu2' href='{{ url("/order") }}'>인증서 신청</a></li>
                    <li><a class='menu3' href='{{ url("/certificate") }}'>MY 인증서</a></li>
                    {{--<li><a class='menu4' href='{{ url("") }}'>인증서 찾기</a></li>--}}
                    <li><a class='{{ url("/community/notice") }}'>고객센터</a>
                        <div>
                            <a href='{{ url("/community/notice") }}'>공지사항</a>
                            <a href='{{ url("/community/faq") }}'>FAQ</a>
                            <a href='{{ url("/community/inquire") }}'>1:1 문의</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>