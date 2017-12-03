@extends( 'mobile.layouts.default' )

@section( 'content' )
    <div id='main_wrap'>

        <div class="main-visual-wrap">
            <div class="contents-inner">
                <p class="main-visual-slogan">
                    내 차의 <strong>진단, 평가와<br> 보증</strong>을 한번에!
                </p>
                <div class="main-visual-slide">
                    <div class="main-visual-slide-in">
                        <ul class="bxslider">
                            <li>
                                <p>내가 산 차가<br>침수차인지 궁금하다면?</p>
                                <a href="">확인하기</a>
                            </li>
                            <li>
                                <p>내 차 판매 가격<br>잘 받은 건지 궁금하다면?</p>
                                <a href="">확인하기</a>
                            </li>
                            <li>
                                <p>제조사 보증 끝난 수입차<br>연장보증이 궁금하다면?</p>
                                <a href="">확인하기</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-contents-block">
            <h3>같은 수리 항목, 다른 비용?!</h3>
            <p>제조사 보증 기간은 끝났는데 큰 돈 나가는 수리 내용이 발생했다면?</p>
            <p class="thumb receipt">
                {{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0101.png"), "공식 서비스 센터 수리비 영수증") }}
                <br>
                {{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0102.png"), "차검사 수리비 영수증") }}
            </p>
        </div>

        <div class="main-banner">
            <img src="images/main_bn.png" alt="차검사 하셨군요!">
        </div>

        <div class="main-contents-block wht">
            <h3>세계 1위 보쉬카 네트워크의 진단</h3>
            <ul class="main-network">
                <li>
                    <p class="thumb">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0201.jpg")) }}</p>
                    <dl>
                        <dt>전세계 제조사 대부분 보쉬 부품 사용</dt>
                        <dd><hr>B사, A사, M사 등 전세계 완성차<br>제조사에서  보쉬 부품 사용</dd>
                    </dl>
                </li>
                <li>
                    <p class="thumb">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0202.jpg")) }}</p>
                    <dl>
                        <dt>높은 수준의 진단, 정비 기술</dt>
                        <dd><hr>국산차, 수입차를 아우르는 진단, 정비<br>16개 영역, 130여 개 항목 진단</dd>
                    </dl>
                </li>
                <li>
                    <p class="thumb">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0203.jpg")) }}</p>
                    <dl>
                        <dt>전세계 최대 네트워크망</dt>
                        <dd><hr>전세계 150개국 15,000개 가맹점<br>대한민국 300여 개 정비소 분포</dd>
                    </dl>
                </li>
            </ul>
            <div class="btn-box">
                <a href="" class="sky">진단항목 자세히 보기</a>
            </div>
        </div>

        <div class="main-contents-block">
            <h3>국내 최초 자동차 등급/가격 인증서 발급</h3>
            <p>차검사는 법적 권한을 가진 전문가가 직접 평가하고 발급합니다.</p>
            <div class="main-certification">
                <p class="thumb">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0301.png")) }}</p>
                <div class="table-box">
                    <table>
                        <caption>국내 최초 자동차 등급</caption>
                        <colgroup>
                            <col style="width:20%"><col style="width:*"><col style="width:30%"><col style="width:30%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>구분</th>
                            <th>차량모델</th>
                            <th>차검사 인증서</th>
                            <th>차검사 케어</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th rowspan="2">국산차</th>
                            <td class="ac">소형</td>
                            <td class="ac">150,000원</td>
                            <td class="ac">150,000원</td>
                        </tr>
                        <tr>
                            <td class="ac">중/대형</td>
                            <td class="ac">200,000원</td>
                            <td class="ac">200,000원</td>
                        </tr>
                        <tr>
                            <th rowspan="2">수입차</th>
                            <td class="ac">소형</td>
                            <td class="ac">300,000원</td>
                            <td class="ac">300,000원</td>
                        </tr>
                        <tr>
                            <td class="ac">중/대형</td>
                            <td class="ac">350,000원</td>
                            <td class="ac">350,000원</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p class="small">※ 차검사 인증서 신청 시 케어 상품 (무상 수리 보증)을 옵션으로 구매 가능합니다.</p>
            </div>
            <div class="btn-box">
                <a href="" class="green">차검사 인증서 더 보기</a>
            </div>
        </div>

        <div class="main-contents-block wht">
            <h3>180일 무상 보증, 최대 20배 보상</h3>
            <p>인증서 발급 시 차검사 케어를 추가 선택하면 해당 내용을 수리 보증합니다.</p>
            <div class="table-box">
                <table class="care">
                    <caption>인증서 발급 시 차검사 케어</caption>
                    <colgroup>
                        <col style="width:30%"><col style="width:35%"><col style="width:35%">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>구분</th>
                        <th><strong>차검사</strong></th>
                        <th>A사</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>가입 가능 차종</th>
                        <td class="ac dark">국산차, 수입차</td>
                        <td class="ac">국산차, 수입차</td>
                    </tr>
                    <tr>
                        <th>신청비용</th>
                        <td class="ac dark">국산차 최대 20만원<br> 수입차최대 25만원</td>
                        <td class="ac">국산차 최대 100만원<br> 수입차최대 300만원</td>
                    </tr>
                    <tr>
                        <th>보상한도</th>
                        <td class="ac dark">국산차 최대 13배<br> 수입차최대 20배</td>
                        <td class="ac">국산차 최대 10배<br> 수입차최대 5배</td>
                    </tr>
                    <tr>
                        <th>보증기간<br>(주행거리 조건)</th>
                        <td class="ac dark">180일<br>(제한 없음)</td>
                        <td class="ac">180일<br>(16만km 이하)</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p class="small">※ 수리 보증은 블루핸즈와 보쉬를 포함한 전국 1,700여 개 수리점에서 담당하여, 전국 어디서나 편리하게 이용하실 수 있습니다.</p>

            <div class="btn-box">
                <a href="" class="sky">보증 내용 더 보기</a>
            </div>
        </div>

        <div class="main-banner02">
            <h3>이 모든 것이 하루 1,600원부터</h3>
            <p>해당 금액은 차검사 인증서 금액이며, 차검사 케어를 <br>추가 선택할 경우 별도 비용이 발생합니다.</p>
            <a href="">차검사 더 알아보기</a>
            <a href="">차검사 신청하기</a>
        </div>

        <div class="main-contents-block wht">
            <h3>지금 상담 받기</h3>
            <p>차검사에 대해 더 궁금하다면 지금 바로 상담을 신청해 보세요.<br>내 차에 어떤 혜택을 받을 수 있는지 전문 상담가가 알려 드립니다.</p>

            <div class="main-counsel">
                <p class="thumb">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/main0401.png")) }}</p>
                <ul>
                    <li><input type="text" placeholder="이름"></li>
                    <li><input type="text" placeholder="휴대폰 번호"></li>
                    <li><input type="email" placeholder="chagumsa@example.com"></li>
                    <li><textarea placeholder="궁금한 점이나 상담 받고 싶은 내용을 적어주시면 &#13;&#10; 맞춤 상담을 받으실 수 있습니다."></textarea></li>
                </ul>
            </div>
            <div class="btn-box">
                <a href="">상담 받기</a>
            </div>
        </div>


    </div>

    <!-- ───────────────────────────────────────────────────────────────── -->




@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )



{{--{{ Html::script(Helper::assets( 'themes/v1/mobile/js/main.js' )) }}--}}
{{--{{ Html::script(Helper::assets( 'themes/v1/mobile/js/modernizr.custom.53451.js' )) }}--}}
{{--{{ Html::script(Helper::assets( 'themes/v1/mobile/js/jquery.gallery.js' )) }}--}}
<script type="text/javascript">
    $(function () {

        var c = 1;

        $(".msb_next").on("click", function(){

            var n = c+1;
            if(c < 3){
                $("#msb_" + c).hide();
                $("#msb_" + n).fadeIn(400);
                c++;
            }else{
                $("#msb_" + c).hide();
                $("#msb_1").fadeIn(400);
                c=1;
            }


        });

        $(".msb_prev").on("click", function(){
            var p = c-1;
            if(c > 1){
                $("#msb_" + c).hide();
                $("#msb_" + p).fadeIn(400);
                c--;
            }else{
                $("#msb_1").hide();
                $("#msb_3").fadeIn(400);
                c=3;
            }
        });

        $(".main-visual-slide-in .bxslider").bxSlider({
            controls: true,
            auto : true,
            autoControls: false,
            pager : true,
            pause : 5000
        });

    });
</script>
@endpush
