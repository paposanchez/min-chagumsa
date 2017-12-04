@extends( 'web.layouts.default' )

@section( 'content' )
    <!-- [s] subgnb -->
    <div id='sub_title_wrap'>
        <h2>차검사 팁
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> 차검사 <i class="fa fa-angle-right"></i>  <span>중고차 성능기록과 실제 차이</span></div>
        </h2>
    </div>
    <!-- [e] subgnb -->


    <!-- [s] contents -->
    <div id='sub_full_wrap' class="topMargin wht">
        <div class="contents-inner inpadding">
            <ul class='menu_tab_wrap'>
                <li><a class='select' href="{{ route('information.index') }}">중고차 성능기록과 실제 차이</a></li>
                <li><a href="{{ route('information.price') }}">보증 기간 만료와 수리비 폭탄</a></li>
                <li><a href="{{ route('information.guide') }}">제 값 받기 힘든 내 차 가격</a></li>

            </ul>

            <div class="contents-title-box">
                <p>[차검사 이야기] 구매할 때 성능기록부와 실제 상태가 달라요.</p>
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
                        <a href="http://www.facebook.com/sharer/sharer.php?u={{url('/information/index')}}" target="_blank" class="fb">facebook</a>
                        <a href="https://twitter.com/intent/tweet?text=TEXT&url={{url('/information/index')}}" target="_blank" class="tw">twitter</a>
                        <a href="" class="cp" onclick="javascript:copy_trackback(this.href); return false;"></a>
                    </div>
                </div>
            </div>

            <div class="contents-sample-box">
                <p class="img">
                    {{ Html::image('/assets/themes/v1/web/img/tip/sample0101.png') }}
                </p>
                <div class="description">
                    <p>#55,000km 주행한 중형 중고차를구입했다. 이후 서비스센터를 통해 정비 이력에 주행거리가 10만km로 기재돼 있음을 확인, 중고차 매매 사업자에게 주행거리 조작에 대한 손해배상을 요구했지만 거부당 하고 피해보상도 받지 못했다. </p>
                    <p># 중고차를 구매하기 전에 성능 및 상태점검기록부에서 문제 없음을 확인하고 중고차를 구매했다. 하지만 한 달 뒤 냉각수 누수 및 미션오일 누유,  하부 부식을 발견했고 매매 사업자에게 보증수리 요구했지만 거절당했다.</p>
                </div>
            </div>

            <div class="contents-description-box">
                <p>지난해 중고차 거래는 380만 대로 신차 거래 167만 대의 2배를 훌쩍 넘어섰습니다. 중고차 거래액은 30조 원으로 앞으로 2배 이상 늘어날 것으로 예측하고 있습니다. 신차 가격은 큰 폭으로 오르는 반면 가계 부채가 늘어 구매력이 낮아진 소비자들이 중고차에 관심을 갖는 것입니다.</p>

                <h3>늘어나는 소비자 사례</h3>
                <p>중고차 시장이 크게 성장한 만큼 중고차 관련 소비자 피해도 급증하고 있습니다. 허위매물은 물론 성능기록, 주행거리 조작 등은 매년 사회적 문제로 대두되고 있는 대표적 피해 사례입니다. 한국소비자원이 접수한 2013~2014년 중고자동차 매매 관련 소비자 피해는 총 843건 입니다. 이 중 중고차 성능 점검 내용과 실제 차량의 상태가 다른 경우가 651건(77.2%)으로 가장 많았습니다. 세부적으로는 '성능 및 상태 불량'이 333건(51.2%)으로 가장 많았고, 사고 정보 고지 미흡 180건(27.6%), 주행거리 조작 68건(10.4%), 연식 및 모델이 다른 경우 39건(6%), 침수차량 미고지 31거(4.8%) 순으로 나타났습니다.</p>

                <div class="figure-box">
                    <h4>중고차 매매 관련 소비자 피해</h4>
                    <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0102.jpg', '중고차 매매 관련 소비자 피해 그래프') }}</p>
                </div>

                <p>소비자 보호를 위해 2005년에 도입된 중고차의 성능점검 제도에 문제가 있고 이를 신뢰할 수 없다는 뜻입니다. 중고차 성능상태 점검을 주관하는 기관들이 3만원 짜리 종이장사를 한다는 비아냥을 듣는 이유이기도 합니다. 또한 중고차의 가격 기준이 없어 가격을 결정하는 주체에 따라 불투명하게 결정되어, 결국 판매자이며 구매자인 소비자들이 피해를 보고 있습니다.</p>

                <div class="thumb-box">
                    <ul>
                        <li>
                            <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0103.jpg') }}</p>
                            <dl>
                                <dt>주행거리 조작</dt>
                                <dd>A씨는 5만5천km 주행한 중고차 구입 자동차등록원부의 실제 주행거리가 27만km 임을 확인하고 환급 요구했지만 거절 당하고 피해 보상도 받지 못함</dd>
                            </dl>
                        </li>
                        <li>
                            <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0104.jpg') }}</p>
                            <dl>
                                <dt>차량 성능사기</dt>
                                <dd>B씨는 성능, 상태점검기록부에서 문제 없음을 확인 후 중고차 구매 이후 냉각수 누수 및 미션오일 누유, 하부 부식을 발견했고 매매사업자에 보증수리를 요구했지만 거절당함</dd>
                            </dl>
                        </li>
                        <li>
                            <p class="thumb">{{ Html::image('/assets/themes/v1/web/img/tip/sample0105.jpg') }}</p>
                            <dl>
                                <dt>피해보상 책임 회피</dt>
                                <dd>피해구제 접수 450건<br> 당사자간 합의 종결 161건<br> 피해보상 없음 289건</dd>
                            </dl>
                        </li>
                    </ul>
                </div>

                <p>물론 성실하고 믿을 수 있는 중고 자동차 매매업자도 많을 테지만, 피해사례가 급증하고 있는 만큼 주의가 필요합니다. 중고차동차 매매상에 대한 불신이 커지면서 개인간 직거래도 증가하고 있습니다. 하지만 개인간 직거래 또한 성능 불량 등 품질의 위험성과 합리적 가격 책정의 어려움, 거래 후 발생하는 문제에 대한 법적인 보호를 받기 힘든 만큼 소비자 개인이 조금 더 꼼꼼히 따져보고 준비해야 피해를 최소화 할 수 있습니다.</p>
                <p>차검사는 세계 1위의 차량 부품 및 진단 글로벌기업 보쉬가 차량의 16개 영역, 130여 항목을 최첨단 장비를 활용해 정밀진단하고 소비자에게 정확한 품질상태를 정보를 제공합니다.</p>
                <div class="btn-box">
                    <a href="{{ url('/chagumsa-info#anc02') }}" class="btns sky">보증 방법 알아보기</a>
                    <a href="{{ url('/order') }}" class="btns sky">차검사 신청하기</a>
                    <a href="{{ url('/community/inquire') }}" class="btns sky">1:1 문의하기</a>
                </div>
            </div>

            <div class="contents-relation-box">
                <h3>‘자동차’ 관련글</h3>
                <ul>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url('/information/index') }}">{{ Html::image('/assets/themes/v1/web/img/tip/sample0106.jpg') }}</a></p>
                            <p class="txt"><a href="{{ url('/information/index') }}">[차검사 이야기] 수리비 폭탄 맞았어요!</a></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="thumb"><a href="{{ url('/information/guide') }}">{{ Html::image('/assets/themes/v1/web/img/tip/sample0107.jpg') }}</a></p>
                            <p class="txt"><a href="{{ url('/information/guide') }}">[차검사 이야기] 내 차 가격이 이것 밖에 안 되나요?</a></p>
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
    <script type="text/javascript">
        <!--
        function copy_trackback(trb) {
            var IE=(document.all)?true:false;
            if (IE) {
                if(confirm("이 글의 트랙백 주소를 클립보드에 복사하시겠습니까?"))
                    window.clipboardData.setData("Text", trb);
            } else {
                temp = prompt("이 글의 링크 주소입니다. 링크를 복사하여 사용해주세요.", trb);
            }
        }
        //-->
    </script>
@endpush
