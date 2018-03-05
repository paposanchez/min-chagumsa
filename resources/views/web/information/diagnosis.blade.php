@extends( 'web.layouts.default' )

@section( 'content' )
    <section id="content" class="content-alt">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center m-t-10  m-b-20">
                        <h1 class="c-white">차검사 진단</h1>
                        <hr class="line dark">
                        <h3 class="c-white c-light">자동차 상태를 정확하고 구체적으로 알 수 있는 방법!</h3>
                        <h6 class="c-white c-light">전국 300개 지점 중 가장 가까운 보쉬카서비스에서 진단 받으세요.</h6>
                    </div>

                </div>
            </div>

            <div class="card subnavigation">

                <div class="card-body card-padding">

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <p>
                                {{ Html::image('/assets/img/sub_images/title-icon_01.png') }}
                            </p>
                            <h5 class="c-gray">대상</h5>
                            <h3 class="c-blue">진단을 원하는 모든 차량</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>
                                {{ Html::image('/assets/img/sub_images/title-icon_01-02.png') }}
                            </p>
                            <h5 class="c-gray">금액</h5>
                            <h3 class="c-blue">국산 10만원 / 수입 15만</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>
                                {{ Html::image('/assets/img/sub_images/title-icon_01-03.png') }}
                            </p>
                            <h5 class="c-gray">유효</h5>
                            <h3 class="c-blue">30일 이내</h3>
                        </div>
                    </div>

                </div>
                <small class="pull-right c-gray">* 유효는 발급일 기준입니다.</small>

            </div>


            <div class="card">

                <div class="card-body card-padding">

                    <div role="tabpanel">

                        <ul class="tab-nav text-left fw-nav" role="tablist">
                            <li class="active"><a href="#home1" caria-controls="home1" role="tab"
                                                  data-toggle="tab">차검사 진단</a></li>
                            <li><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">상품약관</a></li>
                            <li><a href="#home3" aria-controls="home3" role="tab" data-toggle="tab">진단항목</a></li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="home1">

                                <dl>
                                    <dt><h4>특징</h4></dt>
                                    <dd class="p-b-20">
                                        300개 이상의 보쉬 네트워크를 통한 130여개 항목 점검 및 진단서 발급
                                    </dd>

                                    <dt><h4>내용</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>원하는 정비소와 시간을 온라인으로 간편하게 선택 및 예약</li>
                                            <li>보쉬 인증 엔지니어가 130여개의 점검 항목을 정밀 진단(사고/침수 흔적 관련 점검 항목 포함, 부위별 사진 데이터 제공)
                                            </li>
                                            <li>차량 입고 후 최대 2시간내 차검사 진단서 발급(온라인 발급 및 조회, 다운로드 가능)</li>
                                            <li>발급된 차검사 진단서는 보증기간 내 보증프로그램에 의해 보호</li>
                                        </ul>
                                    </dd>

                                    <dt><h4>절차</h4></dt>
                                    <dd class="p-b-20">
                                        <div class="block bordered">

                                            <div class="">
                                                {{--<h4>온라인 상품 구매 및 입고 예약</h4>--}}
                                                <div class="">
                                                    {{ Html::image('/assets/img/sub_images/body-icon_01.png') }}
                                                    <h4>온라인 상품 구매 및<br>입고예약</h4>
                                                </div>

                                                {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                                <div class="">
                                                    {{ Html::image('/assets/img/sub_images/body-icon_02.png') }}
                                                    <h4>예약일시에<br>정비소 입고</h4>
                                                </div>

                                                {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                                <div class="">
                                                    {{ Html::image('/assets/img/sub_images/body-icon_03.png') }}
                                                    <h4>전문 엔지니어가<br>진단</h4>
                                                </div>

                                                {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                                <div class="">
                                                    {{ Html::image('/assets/img/sub_images/body-icon_04.png') }}
                                                    <h4>차검사 진단서 발행<br>(총 2시간 이내)</h4>
                                                </div>

                                            </div>

                                        </div>
                                    </dd>

                                    <dt><h4>보증</h4></dt>
                                    <dd class="p-b-20">진단서 내용의 오류 또는 그로 인한 피해 발생 시</dd>

                                    <dt><h4>보증범위</h4></dt>
                                    <dd class="p-b-20 c-blue">발급일로부터 30일 이내 유효</dd>

                                    <dt><h4>보증절차</h4></dt>
                                    <dd class="p-b-20">
                                        <div class="block bordered">
                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_01.png') }}
                                                <h4>고객센터 접수</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_05.png') }}
                                                <h4>재진단 여부 평가</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_04.png') }}
                                                <h4>진단서 재발급 및<br>보증프로그램 진행</h4>
                                            </div>
                                        </div>
                                    </dd>

                                    <dt><h4>유의사항</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>입고 1시간전 까지 주문 취소, 예약 변경 가능</li>
                                            <li>예약 변경시 BCS 및 예약자에게 자동 알림</li>
                                            <li>진단 중 정비 항목에 대한 수리는 해당 엔지니어를 통해 현장에서 즉시 가능</li>
                                        </ul>
                                    </dd>

                                </dl>


                            </div>

                            <div role="tabpanel" class="tab-pane" id="home2">
                                <dl>
                                    <dt><h4>차량 정보 수집</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>130여 개 항목의 진단 결과와 상품 신청 시 고객 기입 항목, 차량등록증 내용을 수집하여 종합적으로 진단서를 작성합니다.
                                            </li>
                                            <li>정확한 내용 확인을 위해 아래 정보를 수집합니다.<br>(수집정보 : 차량등록번호, 신차출고일, 차대번호, 진단서발급일,
                                                변속기구분, 연료구분, 발급일 기준 주행거리)
                                            </li>
                                        </ul>
                                    </dd>

                                    <dt><h4>보증기간</h4></dt>
                                    <dd class="p-b-20 c-blue">발급일로부터 30일 이내 유효</dd>

                                    <dt><h4>진단 항목</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>차검사 진단서는 사고유무, 침수흔적을 포함한 130여 개 항목을 진단합니다.</li>
                                            <li>진단항목 : 주요 내/외판, 사고유무, 침수흔적, 차량외판, 차량실내, 소모품 상태, 전장품/유리기어, 에러상태진단, 엔진,
                                                변속기, 동력전달, 조향장치, 제동장치, 전기장치, 휠&타이어, 주행테스트
                                            </li>
                                        </ul>
                                    </dd>

                                    <dt><h4>보증 내용 및 범위</h4></dt>
                                    <dd class="p-b-20">
                                        진단서 내용의 오류 또는 그로 인한 피해 발생 시 귀하가 문제에 대한 근거 자료를 (주)짐브러스에 전달해야 하며, 해당 내용에 대해
                                        (주)짐브러스 내부 검토 후 결과에 따라 재진단 혹은 알맞은 피해 보상 등의 조치를 합니다.

                                        <ol>
                                            <li>타 정비소 혹은 기술사 등 공인된 곳의 진단 결과만이 근거 자료로 효력을 가집니다.</li>
                                            <li>발급된 차검사 진단서와 문제 차량의 동일성이 확인되어야 합니다.</li>
                                            <li>각 장치에 대한 불법 구조 변경이 없어야 합니다.</li>
                                            <li>재진단 시 비용은 (주)짐브러스가 부담합니다.</li>
                                            <li>진단서 오류로 인한 피해 발생 시 결제 금액의 70% 내에서 보상합니다.</li>
                                        </ol>
                                    </dd>

                                </dl>

                            </div>

                            <div role="tabpanel" class="tab-pane" id="home3">
                                <table class="table">
                                    <colgroup>
                                        <col width="15%">
                                        <col width="20%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="20%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th class="text-center">영역</th>
                                        <th class="text-center">항목</th>
                                        <th class="text-center">진단개수</th>
                                        <th class="text-center">영역</th>
                                        <th class="text-center">항목</th>
                                        <th class="text-center">진단개수</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">주요 내/외판</td>
                                            <td class="text-center">차체 및 주요 골격</td>
                                            <td class="text-center">18</td>
                                            <td class="text-center">엔진</td>
                                            <td class="text-center">엔진장공상태, 오일, 냉각수, 엔진마운트</td>
                                            <td class="text-center">13</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">사고유무</td>
                                            <td class="text-center">실제 차축 프레임 진단</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">변속기</td>
                                            <td class="text-center">오일누유, 유량상태, 변속기 마운트 등</td>
                                            <td class="text-center">8</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">침수흔적</td>
                                            <td class="text-center">엔진룸, 실내, 트렁크</td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">동력전달</td>
                                            <td class="text-center">등록조인트, 추진축 및 베어링</td>
                                            <td class="text-center">8</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">차량외판</td>
                                            <td class="text-center">차량외판, 범퍼, 등화 관련</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">조향장치</td>
                                            <td class="text-center">차체 및 주요 골격</td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">차량실내</td>
                                            <td class="text-center">계기패널, 콘솔박스, 내장트림, 시트 등</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center">제동장치</td>
                                            <td class="text-center">브레이크 오일유량, 디스크, 배력장치 등</td>
                                            <td class="text-center">7</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">소모품 상태</td>
                                            <td class="text-center">엔진오일, 브레이크패드, 배터리, 타이밍벨트 등</td>
                                            <td class="text-center">9</td>
                                            <td class="text-center">전기장치</td>
                                            <td class="text-center">발전기, 시동모터, 실내송품모터 등</td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">전장품/유리기어</td>
                                            <td class="text-center">도어록, 와이퍼, 사이드미러, 전동시트 등</td>
                                            <td class="text-center">9</td>
                                            <td class="text-center">휠&타이어</td>
                                            <td class="text-center">휠손상, 타이어편마모, 타이어접지면 등</td>
                                            <td class="text-center">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">전문진단기</td>
                                            <td class="text-center">에러 상태 진단</td>
                                            <td class="text-center">10</td>
                                            <td class="text-center">주행테스트</td>
                                            <td class="text-center">운전 점검</td>
                                            <td class="text-center">5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>


                </div>

            </div>

        </div>
    </section>

@endsection
