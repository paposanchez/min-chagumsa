@extends( 'mobile.layouts.default' )

@section( 'content' )



    <!-- [s] subgnb -->
    <div id='sub_title_wrap'>차검사 팁</div>
    <!-- [e] subgnb -->


    <!-- [s] contents -->

    <div class="menu-tab-box">
        <ul class='menu_tab_wrap'>
            <li><a href="{{ url("/information/index") }}">중고차 성능기록과 실제 차이</a></li>
            <li><a href="#" class="select">보증 기간 만료와 수리비 폭탄</a></li>
            <li><a href="{{ url("/information/guide") }}">제 값 받기 힘든 내 차 가격</a></li>
        </ul>
    </div>

    <div id='sub_wrap' class="wht">
        <div class="contents-inner">
            <div class="contents-title-box">
                <p>[차검사이야기] 수리비 폭탄 맞았습니다.</p>
                <div class="contents-writer">
                    <span>차검사</span>
                    <strong>차검사 에디터</strong>
                    <time>2017년 11월 06일 오전 06:00</time>
                    <div class="hash">
                        <span>#자동차</span>
                        <span>#중고차</span>
                        <span>#피해</span>
                    </div>
                    <div class="sns">
                        <a href="" class="fb">facebook</a>
                        <a href="" class="tw">twitter</a>
                        <a href="" class="cp">copy</a>
                    </div>
                </div>
            </div>

            <div class="contents-sample-box">
                <p class="img">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/sample0201.png")) }}</p>
                <div class="description">
                    <p># 1년 전 꿈에 그리던 수입차 오너가 됐다. 3000만 원대 예산으로 원하던 수입차량을 구입하게 됐다.<br> 하지만 수입차 제조사의 수리보증이 끝난 뒤 예상치 못한 문제가 터졌다.</p>
                    <p>브레이크 장치 중 주요 부품을 교체하게 된 것. 총 200만 원을 들여 수리했지만 3개월 뒤 또 다른 문제가 터졌다. 변속기가 고장 난 것이다. 수리비 견적은 300만 원. 결국 수리비 부담 때문에 차를 팔게 됐다.</p>
                </div>
            </div>

            <div class="contents-description-box">
                <p>'배보다 배꼽이 크다'는 수입차 수리비 문제는 어제오늘 일이 아닙니다. 국내 내수 시장에서 수입차량이 차지하는 비율은 올해 15.2%로 나타났습니다. 수입차가 증가하는 만큼 수입차 수리비도 함께 증가하고 있습니다. 수입차 구매자에게 구매 후 3년은 보유냐 파느냐를 결정해야 하는 시점입니다. AS기간인 3년이 지나면 수리비가 급격히 높아지기 때문입니다.</p>

                <h3>비싼 외산 자동차 수리비</h3>
                <p>한국보험개발원에 따르면 비슷한 가격대의 국산차와 외산 자동차의 수리비를 비교했을 때 외산차는 적게는 2~3배, 많게는 8배 이상 비싼 것으로 나타났습니다. 부품 원가가 비싼 데다 국내 부품 보유량이 적은 것도 원인이기 때문입니다.  또한 자동차 메이커들이 주요부품에 대해 디자인보호권을 등록해 놓은 상태라서, 20년 간 대체부품 유통이 사실상 차단된 것입니다.</p>
                <p>더 큰 문제는 국산 및 수입차 업체들이 대체부품을 쓰면 통상 3년인 무상서비스 기간을 보장하기 어렵다는 입장을 보인다는 것입니다. 문제가 발생할 경우 책임소재를 밝히기 곤란하다는 게 이유입니다.  결국 울며 겨자먹기로 소비자들은 비싼 비용을 지불하고 제조사의 유상 AS를 받거나 별도 사설 정비센터를 이용하게 되는 거죠.</p>

                <div class="figure-box">
                    <h4>수입차 수리비 현황<br><span>(단위: 억원)</span></h4>
                    <p class="thumb">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/sample0202.jpg"), "수입차 수리비 현황 그래프") }}</p>
                </div>

                <p>제조자 AS 기간이 끝난 수입차를 구매 후 엔진 등 주요 구동부위에 문제가 생길 경우 소비자가 부담해야 할 비용은 상상을 초월할 정도로 비쌉니다.  수입차는 구매보다 유지가 더 어려운 이유가 여기 있습니다.</p>
                <p>제조사 무상 AS 기간이 끝난 차량을 사용 중이거나 구매할 계획이라면 차검사를 이용하세요. 차검사 인증을 받은 차량은 6개월 동안 수리비용이 비싼 ‘엔진’, ‘미션’, ‘브레이크’, ‘조향장치’, ‘공조장치’에 문제가 발생시 최대 400만원까지 수리보증 합니다.</p>

                <div class="btn-box">
                    <a href="{{ url(("/chagumsa-info#anc07")) }}" class="btns sky">보증 연장 알아보기</a>
                    <a href="{{ url("/order") }}" class="btns sky">차검사 신청하기</a>
                    <a href="{{ url("/community/inquire") }}" class="btns sky">1:1 문의하기</a>
                </div>
            </div>

            <div class="contents-relation-box">
                <h3>‘자동차’ 관련글</h3>
                <ul>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url("/information/index") }}">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/sample0203.jpg")) }}</a></p>
                            <p class="txt"><a href="{{ url("/information/index") }}">[차검사 이야기] 구매할 때 성능기록부와 실제 상태가 달라요!</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url("/information/guide") }}">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/sample0107.jpg")) }}</a></p>
                            <p class="txt"><a href="{{ url("/information/guide") }}">[차검사 이야기] 내 차 가격이 이것 밖에 안 되나요?</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url("/chagumsa-info") }}">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/sample0108.jpg")) }}</a></p>
                            <p class="txt"><a href="{{ url("/chagumsa-info") }}">내 차 진단부터 평가, 보증까지 믿고 맡길 곳 없을까?</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url("/chagumsa-info#anc07") }}">{{ Html::image(\App\Helpers\Helper::theme_mobile("/images/sample0109.jpg")) }}</a></p>
                            <p class="txt"><a href="{{ url("/chagumsa-info#anc07") }}">하루 1,600원으로 180일 동안, 최대 20배를 보장해 준다면?</a></p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </div>
    <!-- [e] contents -->

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {

    });
</script>

@endpush