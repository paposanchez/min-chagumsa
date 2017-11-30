@extends( 'web.layouts.default' )

@section( 'content' )
    <!-- [s] subgnb -->
    <div id='sub_title_wrap'>
        <h2>차검사
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 차검사 <i class="fa fa-angle-right"></i>  <span>중고차 성능기록과 실제 차이</span></div>
        </h2>
    </div>
    <!-- [e] subgnb -->


    <!-- [s] contents -->
    <div id='sub_full_wrap' class="topMargin wht">
        <div class="contents-inner inpadding">
            <ul class='menu_tab_wrap'>
                <li><a href="{{ route('information.index') }}">중고차 성능기록과 실제 차이</a></li>
                <li><a href="{{ route('information.price') }}">보증 기간 만료와 수리비 폭탄</a></li>
                <li><a class='select' href="{{ route('information.guide') }}">제 값 받기 힘든 내 차 가격</a></li>
            </ul>

            <div class="contents-title-box">
                <p>[차검사 이야기] 내 차 가격이 이것 밖에 안 되나요?</p>
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
                <p class="img">{{ Html::image('/assets/themes/v1/web/img/tip/sample0301.png') }}</p>
                <div class="description">
                    <p># 5년 전 국산 중형세단을 구입했다. 나중에 판매할 때를 대비해 엔진오일도 정기적으로 갈아주고 기타 소모품도 교환주기에 맞춰 갈아주면서 차량 내부도 꼼꼼히 관리했다. 관리한 만큼 높은 가격을 기대했지만 중고차 매매상과 온라인 매매 사이트는 판매시세의 70% 금액에 A씨의 차량을 매입하겠다는 제안이 대다수였다. 누구보다 꼼꼼하게 관리한 내 차를 헐값에 넘기는 기분이 들었고 내 차의 제대로 된 가격을 받을 수 있을지 고민에 빠졌다.</p>
                </div>
            </div>

            <div class="contents-description-box">
                <p>중고차를 사거나 팔 때 가장 중요한 것은 무엇일까요? 아마도 품질만큼 중요한 것이 가격 아닐까요. 하지만 중고차의 가격을 확인하는 것은 쉽지 않습니다. 성능, 연식, 주행거리, 사고유무 등 중고차 가격에 영향을 주는 요인들이 너무 많기 때문입니다.</p>

                <h3>들쑥날쑥 중고차 매매 가격</h3>
                <p>중고차 가격은 대부분 중고차 매매 사업자에 의해 결정됩니다. 하지만 중고차 매매 사업자가 결정하는 중고차 가격은 기준이 정확하지 않습니다. 왜냐하면 딜러는 중고차 매입 가격에 일정 마진을 붙여 다시 판매하기에 낮은 가격에 매입해 높은 가격에 판매할수록 이익이 커지기 때문입니다. 그래서 중고차 판매자는 제 값 받고 차를 팔 수 있을지 불안하고, 구매자는 좋지 않은 차를 비싸게 구매하게 될까 봐 불안하게 됩니다</p>

                <div class="thumb-box">
                    <h4>A씨 차량 견적</h4>
                    <ul>
                        <li>
                            <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0302.jpg'), '매매단지 3,350만원' }}</p>
                        </li>
                        <li>
                            <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0303.jpg'), 'A딜러 3,400만원' }}</p>
                        </li>
                        <li>
                            <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0304.jpg'), 'B딜러 3,000만원' }}</p>
                        </li>
                    </ul>
                </div>

                <p>정부는 중고차 시장의 투명성 확보와 소비자 보호를 위해 중고차 가격 조사 산정제도를 작년부터 시행하고 있습니다. 중고차 가격 조사 산정제도란 중고차 거래 시 중고차의 성능 및 상태 등 품질을 근거로 법적 자격을 갖춘 제3의 객관적 주체(기술사)로부터 공정한 중고차 가격을 산정하는  제도입니다.</p>
                <p>차검사는 객관적이고 공정한 중고차 가격을 산정하기 위해 최고의 차량기술사로 구성된 차량기술법인 H&T와 업무 협약을 맺었습니다. 보쉬카서비스의 중고차 성능 및 상태 진단결과를 바탕으로 자동차관리법에 근거해 중고차 가격을 산정합니다. 차검사 인증서의 가격 산정 보고서는 중고차 거래 시 중고차 가격에 대한 객관성을 보장 받을 수 있습니다. 제3자의 객관적 입장에서 중고차 품질에 근거한 공정한 중고차 가격을 산정하기 때문입니다. </p>

                <div class="btn-box">
                    <a href="{{ url('/chagumsa-info#anc02') }}" class="btns sky">내 차 가격 정확히 알기</a>
                    <a href="{{ url('/order') }}" class="btns sky">차검사 신청하기</a>
                    <a href="{{ url('/community/inquire') }}" class="btns sky">1:1 문의하기</a>
                </div>
            </div>

            <div class="contents-relation-box">
                <h3>‘자동차’ 관련글</h3>
                <ul>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url('/information/price') }}">{{ Html::image('/assets/themes/v1/web/img/tip/sample0106.jpg') }}</a></p>
                            <p class="txt"><a href="{{ url('/information/price') }}">[차검사 이야기] 수리비 폭탄 맞았어요!</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url('/information/index') }}">{{ Html::image('/assets/themes/v1/web/img/tip/sample0110.jpg') }}</a></p>
                            <p class="txt"><a href="{{ url('/information/index') }}">[차검사 이야기] 구매할 때 성능 기록부와 실제 상태가 달라요!</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url('/chagumsa-info') }}">{{ Html::image('/assets/themes/v1/web/img/tip/sample0108.jpg') }}</a></p>
                            <p class="txt"><a href="{{ url('/chagumsa-info') }}">내 차 진단부터 평가, 보증까지 믿고 맡길 곳 없을까?</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url('/chagumsa-info#anc07') }}">{{ Html::image('/assets/themes/v1/web/img/tip/sample0109.jpg') }}</a></p>
                            <p class="txt"><a href="{{ url('/chagumsa-info#anc07') }}">하루 830원으로 180일 동안, 최대 20배를 보장해 준다면?</a></p>
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
    <script>
        $(document).ready(function () {

            $('.intro3_tab').mousedown(function () {
                $('.tab_on').removeClass('tab_on');
                $('.intro3_tab_cont').hide();
                $(this).addClass('tab_on');
                $('.' + $(this).attr('id')).show();
            });

        });
    </script>
@endpush
