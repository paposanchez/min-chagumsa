@extends( 'web.layouts.default' )

@section( 'content' )
    <!-- [s] subgnb -->
    <div id='sub_title_wrap'>
        <h2>차검사 소개
            <div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>차검사 소개</span></div>
        </h2>
    </div>
    <!-- [e] subgnb -->


    <!-- [s] contents -->
    <div id='sub_full_wrap' class="topMargin">
        <div class="contents-inner">
            <ul class='menu_tab_wrap fix'>
                <li><a class='select' href="#anc01">서비스 배경</a></li>
                <li><a href="#anc02">차검사란?</a></li>
                <li><a href="#anc03">정밀진단</a></li>
                <li><a href="#anc04">품질등급제</a></li>
                <li><a href="#anc05">차검사 순서</a></li>
                <li><a href="#anc06">차검사 인증서</a></li>
                <li><a href="#anc07">차검사 케어</a></li>
                <li><a href="#anc08">차검사 비용</a></li>
            </ul>
        </div>

        <div class="sub-contents-block" id="anc01">
            <div class="contents-inner inpadding">
                <h3>서비스 배경</h3>
                <p>중고차 시장의 불신으로 믿고 맡길 수 있는 보증 프로그램이 필요합니다.</p>
                <div class="service-anc01">
                    <ul class="bxslider">
                        <li>
                            <div>
                                <a href="#">
                                    <p>딜러 통하면<br>중간 수수료가<br>너무 많아요.</p>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#">
                                    <p>침수차인지<br>육안으로는<br>확인 어려워요.</p>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#">
                                    <p>매매사이트에<br>허위 매물이<br>너무 많아요.</p>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#">
                                    <p>무사고 차라고<br>믿고 샀는데<br>접합차였어요.</p>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#">
                                    <p>성능확인서<br>조작해서<br>판매하던데요.</p>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="btn-box">
                    <a href="{{ url('/information/index') }}" class="btns">사례 자세히 보기</a>
                </div>
            </div>
        </div>

        <div class="sub-contents-block wht" id="anc02">
            <div class="contents-inner inpadding">
                <h3>차검사란?</h3>
                <p>자동차 상태를 제대로 진단하고 이를 보증하여 중고차 시장의 불신을 해소합니다.<br>
                    보쉬카서비스, 차량기술법인, ㈜짐브러스 3자 협약을 통해 자동차 진단 및 가격 산정 서비스를 제공합니다.</p>
                <p class="thumb">
                    {{ Html::image('/assets/themes/v1/web/img/service/service0101.jpg') }}
                </p>
                <ul class="service-anc02">
                    <li>
                        <dl>
                            <dt>엄격한 정밀 진단</dt>
                            <dd>세계 최대 차량 진단 네트워크<br> 보쉬카서비스가 진단합니다.</dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt>공인된 가격 산정</dt>
                            <dd>법적 권한을 가진 전문가가 직접<br>등급 및 가격을 책정합니다.</dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt>인증서, 보증서 발급</dt>
                            <dd>인증서, 보증서 발급 이후<br>6개월 동안 보증합니다.</dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-contents-block" id="anc03">
            <div class="contents-inner">
                <h3>정밀진단</h3>
                <p>전국 300여 개 보쉬카서비스에서 16개 영역, 130여 개 항목을 꼼꼼하게 진단합니다.</p>

                <div class="service-anc03-box">
                    <ul>
                        <li>
                            <dl>
                                <dt>주요 내/외판(18개)</dt>
                                <dd>차체 및 주요 골격</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>사고유무(4개)</dt>
                                <dd>실제 차축 프레임 진단</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>침수흔적(3개)</dt>
                                <dd>엔진룸, 실내, 트렁크</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>차량외판(4개)</dt>
                                <dd>차량외판, 범퍼, 등화 관련</dd>
                            </dl>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <dl>
                                <dt>차량실내(5개)</dt>
                                <dd>계기패널, 콘솔박스, <br>내장트림, 시트 등</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>소모품 상태(9개)</dt>
                                <dd>엔진오일, 브레이크패드, <br>배터리, 타이밍벨트 등 </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>전장품/유리기어(9개)</dt>
                                <dd>도어록, 와이퍼, <br>사이드미러, 전동시트 등</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>전문진단기(10개)</dt>
                                <dd>에러 상태 진단</dd>
                            </dl>
                        </li>
                    </ul>
                    <p class="thumb">
                        {{ Html::image('/assets/themes/v1/web/img/service/service0102.jpg') }}
                    </p>
                    <ul>
                        <li>
                            <dl>
                                <dt>엔진(13개)</dt>
                                <dd>엔진장공상태, 오일, <br>냉각수, 엔진 마운트</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>변속기(8개)</dt>
                                <dd>오일누유, 유량상태, <br>변속기 마운트 등</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>동력전달(8개)</dt>
                                <dd>등록조인트, 추진축 <br>및 베어링 상태</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>조향장치(10개)</dt>
                                <dd>차체 및 주요 골격</dd>
                            </dl>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <dl>
                                <dt>제동장치(7개)</dt>
                                <dd>브레이크 오일유량, <br>디스크, 배력장치 등</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>전기장치 (10개)</dt>
                                <dd>발전기, 시동모터, <br>실내송품모터 등</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>휠&amp;타이어(10개)</dt>
                                <dd>휠손상, 타이어편마모, <br>타이어접지면 등</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>주행테스트(5개)</dt>
                                <dd>운전 점검</dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sub-contents-block wht" id="anc04">
            <div class="contents-inner">
                <h3>품질등급제</h3>
                <p>품질을 등급화하여 <span class="fPointC01">국내 최초</span>로 중고차 인증서를 발급합니다.</p>
                <div class="service-anc04-box">
                    <table>
                        <caption>품질등급표</caption>
                        <colgroup>
                            <col style="width:350px"><col style="width:*">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>무사고</th>
                            <td>
                                <ul>
                                    <li>
                                        <strong>AAA</strong>
                                        <p>사고, 수리, 침수이력 없음<br>표준 주행거리 이내</p>
                                    </li>
                                    <li>
                                        <strong>AA</strong>
                                        <p>경미한 범퍼수리 이력<br>표준 주행거리</p>
                                    </li>
                                    <li>
                                        <strong>A</strong>
                                        <p>단순 외판 수리이력<br>외판 및 실내상태 보통</p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>사고이력</th>
                            <td>
                                <ul>
                                    <li>
                                        <strong>B</strong>
                                        <p>중손상의 사고이력<br>차량상태 보통</p>
                                    </li>
                                    <li>
                                        <strong>C</strong>
                                        <p>주요 골격부, 대손상 이력<br>기계적 수리, 정비 필요</p>
                                    </li>
                                    <li>
                                        <strong>D</strong>
                                        <p>책임 보증 불가<br>수리 보증 불가</p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="btn-box">
                    <a href="{{ url('/sample') }}" target="_blank" class="btns">인증서 샘플보기</a>
                </div>
            </div>
        </div>

        <div class="sub-contents-block" id="anc05">
            <div class="contents-inner">
                <h3>차검사 순서</h3>
                <p>차검사 인증서 신청 및 발급은 다섯 가지 순서로 진행됩니다. </p>
                <p class="thumb">
                    {{ Html::image('/assets/themes/v1/web/img/service/service0103.jpg'), '차검사 순서 : 인증서 신청, 입고, 진단, 평가, 인증서 발급' }}
                </p>
            </div>
        </div>

        <div class="sub-contents-block wht" id="anc06">
            <div class="contents-inner">
                <h3>차검사 인증서</h3>
                <p>전문가가 차량을 진단, 평가하여 인증서를 발행하고 책임 보증합니다.</p>
                <div class="service-anc06-box">
                    <ul>
                        <li>
                            <h4>보증 대상 및 기준</h4>
                            <div class="block">
                                <span class="icon icoB">품질 B등급 이상</span>
                            </div>
                            <div class="block">
                                <span class="icon ico02">90일, 5천km</span>
                            </div>
                        </li>
                        <li>
                            <h4>보증 범위</h4>
                            <div class="block">
                                <span>사고차량</span>
                                <p class="ico01">진단 오류에 대해 감가금액을<br>보상 지급합니다.</p>
                            </div>
                            <div class="block">
                                <span>침수차량</span>
                                <p class="ico02">오류에 대해 차량가치산정<br>금액으로 매입합니다.</p>
                            </div>
                            <div class="block">
                                <span>기타 오류 진단</span>
                                <p class="ico03">해당 내용에 대해 수리<br>보상합니다.</p>
                            </div>
                        </li>
                        <li>
                            <h4>수리 보상 절차</h4>
                            <div class="arrow block">
                                <span>고객센터</span>
                                {{--<p class="underline ico04">고객센터로 연락하기</p>--}}
                                <p class="underline ico04"></p>
                            </div>
                            <div class="arrow block">
                                <span>입고</span>
                                <p class="ico05"></p>
                            </div>
                            <div class="block">
                                <span>수리</span>
                                <p class="underline ico03"></p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="btn-box">
                    <a href="{{ url('/order') }}" class="btns">지금 차검사 신청하기</a>
                </div>
            </div>
        </div>

        <div class="sub-contents-block" id="anc07">
            <div class="contents-inner">
                <h3>차검사 케어</h3>
                <p>해당 등급에 한해 무상 수리 보증을 실시하며, 해당 상품은 옵션입니다.</p>
                <div class="service-anc06-box">
                    <ul>
                        <li>
                            <div class="h4-box">
                                <h4>신청 대상</h4>
                                <p>차검사 인증서 발급 차량</p>
                                <p class="indent">※ 수리 보증 비용은 등급에 상관 없이 동일 기준을 적용합니다.<br>
                                    - C등급 : 대손상에 해당하므로 수리 비용의 50%만 지원<br>
                                    - D등급 : 케어 신청이 불가하여 공임비를 제외한 전액 환불</p>

                            </div>
                            <div class="block">
                                <span class="icon icoC">품질 C등급 이상</span>
                            </div>
                            <div class="block">
                                <span class="icon ico02">7년, 14만km</span>
                            </div>
                        </li>
                        <li>
                            <div class="h4-box">
                                <h4>보증 기준</h4>
                                <p>제조사 보증기간 남아있는 경우 만료 후 6개월 연장</p>
                            </div>
                            <div class="block">
                                <p class="ico07">180일, 주행거리 무관</p>
                            </div>
                        </li>
                        <li class="noicon">
                            <div class="h4-box">
                                <h4>수리 보증 항목</h4>
                                <p>차검사는 엔진, 미션, 제동장치 뿐 아니라 조향장치, 냉/난방장치에 대해 수리를 보증합니다.</p>
                                <a href="#Cont01" data-action="toggle">항목 자세히 보기 <span>▼</span></a>
                                <div class="table-box toggle-cont" id="Cont01">
                                    <table>
                                        <caption>수리 보증 항목</caption>
                                        <colgroup>
                                            <col style="width:145px"><col style="width:*">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>항목</th>
                                            <th>내용</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th>엔진</th>
                                            <td>실린더 헤드와 그 내부 부품. 실린더 블록과 그 내부 부품 및 그 구성부품 (커넥팅로드, 오일팬, 크랭크축, 피스톤 등),크랭크 샤프트플리, 오일펌 프, 워터펌프, 워터펌프플리, 캠샤프트, 로커암 샤프트, 로커암커버, 서모스 텟 및 가스켓, 흡기밸브, 배기밸브, 배기매니폴드, 플라이 휠, 엔진오일쿨러 및 각종 오일 제어 밸브, 타이밍벨트체인, 각종 엔진내부 가스켓 및 씰류 등</td>
                                        </tr>
                                        <tr>
                                            <th>미션</th>
                                            <td><p class="dash">- 변속기와 그 내부 부품(유성기어, 킥다운스위치, 리어클러치, 엔드클러치, 원웨이클러치, 쏠레노이드 밸브, 펄스제너레이터, 트랜스퍼  케이스 등), 토크컨버터, 변속기 내부 가스켓 및 오일씰류 등</p>
                                                <p class="dash">- 추진축과 관련 부품, 등속 조인트(단, 고무 부트는 제외), 드라이브 플레이트, 차동기어, 변속기 내부 가스켓 및 씰류 등 </p>
                                                <p class="dash">- 차동장치와 액슬 하우징, 액슬 축, 차축 내부 개스킷 및 오일 씰류 등</p></td>
                                        </tr>
                                        <tr>
                                            <th>제동장치</th>
                                            <td>브레이크마스터실린더, 브레이크 부스터, 프로포셔닝밸브, ABS하이드로닉 유니트, 휠실린더, 휠스피드센서, 브레이크 캘리퍼, 백플레이트, 리턴스 프링, 유압라인, 호스 등</td>
                                        </tr>
                                        <tr>
                                            <th>조향장치</th>
                                            <td>스티어링 기어 링키지, 스티어링 컬럼 샤프트, 유니버셜 조인트, 파워랙, 피니언 부품, 타이로드엔드, 파워스티어링 오일 펌프, 파워스티어링 리저 브, 스티어링 휠, 스티어링 리모트 컨럴, 파워호스 / EPS센서, 등</td>
                                        </tr>
                                        <tr>
                                            <th>냉/난방장치</th>
                                            <td>에어컨 컴프레셔 & 풀리, 에어컨파이프&호스류, 에어컨콘덴서, 이베퍼 레이터, 리시버탱크, 익스팬션 밸브, 히비터스위치, 전동식 파워스티어링, 히터모터, 히터팬, 히터컨트롤유니트, 히터코어 & 서미스터, 모드액추어에 이터, 워터템퍼레이터센서, 블로우모터 등</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li>
                            <h4>수리 보증 절차</h4>
                            <div class="arrow block">
                                <span>고객센터</span>
                                <p class="underline ico04"></p>
                            </div>
                            <div class="arrow block">
                                <span>입고</span>
                                <p class="ico05"></p>
                            </div>
                            <div class="block">
                                <span>수리</span>
                                <p class="underline ico03"></p>
                            </div>
                        </li>
                        <li class="noicon">
                            <div class="h4-box">
                                <h4>수리 네트워크</h4>
                                <p>인증서 발급 후 수리 접수 및 고객 안내는 오토핸즈에서, 수리는 각  수리점에서 진행합니다. </p>
                                <div class="table-box">
                                    <table>
                                        <caption>수리 보증 항목</caption>
                                        <colgroup>
                                            <col style="width:190px"><col style="width:*"><col style="width:*"><col style="width:*"><col style="width:*">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <th class="bg">수리 네트워크</th>
                                            <td class="ac">{{ Html::image('/assets/themes/v1/web/img/service/service0104.jpg') }}</td>
                                            <td class="ac">{{ Html::image('/assets/themes/v1/web/img/service/service0105.jpg') }}</td>
                                            <td class="ac">{{ Html::image('/assets/themes/v1/web/img/service/service0106.jpg') }}</td>
                                            <td class="ac">{{ Html::image('/assets/themes/v1/web/img/service/service0107.jpg') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg">수리 가능 차량</th>
                                            <td class="ac">현대자동차</td>
                                            <td class="ac">기아자동차</td>
                                            <td class="ac">르노삼성자동차</td>
                                            <td class="ac">쌍용, 쉐보레, 수입차</td>
                                        </tr>
                                        <tr>
                                            <th class="bg">수리점 규모(국내)</th>
                                            <td class="ac">1,370개</td>
                                            <td class="ac">824개</td>
                                            <td class="ac">455개</td>
                                            <td class="ac">300여 개</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="btn-box">
                    <a href="{{ url('/order') }}" class="btns">지금 차검사 신청하기</a>
                </div>
            </div>
        </div>

        <div class="sub-contents-block wht" id="anc08">
            <div class="contents-inner">
                <h3>차검사 비용</h3>
                <p>차검사는 품질, 가격을 산정하는 인증서와 옵션 상품인 케어로 구성됩니다.</p>
                <div class="table-box">
                    <table>
                        <caption>차검사 비용</caption>
                        <colgroup>
                            <col style="width:*"><col style="width:230px"><col style="width:340px"><col style="width:340px">
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
                            <td class="ac">200,000원</td>
                        </tr>
                        <tr>
                            <td class="ac">중/대형</td>
                            <td class="ac">350,000원</td>
                            <td class="ac">250,000원</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="tbl-bottom">
                    <li>※ 차검사 인증 금액은 성능 진단 및 가치 산정에 따른 인증서 발급 수수료입니다.(부과세 포함)</li>
                    <li>※ 차검사 인증서 신청 시 케어 상품(무상 수리 보증)을 옵션으로 구매 가능합니다.</li>
                </ul>
            </div>
        </div>

    </div>
    <!-- [e] contents -->


@endsection


@push( 'header-script' )
    <script type="text/javascript">
        $(document).ready(function() {
            $("[data-action]").on("click", function() {
                if($(this).hasClass("on")) {
                    $(this).removeClass("on");
                    $(this).html("항목 자세히보기 <span>▼</span>");
                    $(this).next().hide();
                } else {
                    $(this).addClass("on");
                    $(this).html("항목 접어두기 <span>▲</span>");
                    $(this).next().show();
                }
                return false;
            });

            $(".service-anc01 .bxslider").bxSlider({
                controls: true,
                auto : false,
                pager : false,
                minSlides : 4,
                maxSlides : 4,
                slideMargin : 44,
                slideWidth : 206,
                moveSlides : 1
            });

        });
    </script>
@endpush

@push( 'footer-script' )
@endpush
