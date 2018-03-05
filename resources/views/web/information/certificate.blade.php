@extends( 'web.layouts.default' )

@section( 'content' )
    <section id="content" class="content-alt">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block  text-center m-t-10  m-b-20">

                        <h1 class="c-white">차검사 평가</h1>
                        <hr class="line dark">
                        <h3 class="c-white c-light">차량 전문가에게 책정하는 자동차 가치!</h3>
                        <h6 class="c-white c-light">등급과 가격은 물론 사고/침수 여부까지 평가 가능합니다.</h6>
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
                            <h3 class="c-blue">차검사 진단서 보유 차량</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>
                                {{ Html::image('/assets/img/sub_images/title-icon_01-02.png') }}
                            </p>
                            <h5 class="c-gray">금액</h5>
                            <h3 class="c-blue">국산 5만원 / 수입 5만원</h3>

                        </div>
                        <div class="col-md-4 text-center">
                            <p>
                                {{ Html::image('/assets/img/sub_images/title-icon_01-03.png') }}
                            </p>
                            <h5 class="c-gray">유효</h5>
                            <h3 class="c-blue">90일 또는 5천km 이내</h3>
                        </div>
                    </div>

                </div>
                <small class="pull-right c-gray">* 대상은 차검사 진단서 유효기간 내 모든차량, 유효는 발급일 기준입니다.</small>
            </div>


            <div class="card">

                <div class="card-body card-padding">

                    <div role="tabpanel">

                        <ul class="tab-nav text-left fw-nav" role="tablist">
                            <li class="active"><a href="#home1" caria-controls="home1" role="tab"
                                                  data-toggle="tab">차검사 평가</a></li>
                            <li><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">상품약관</a></li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="home1">

                                <dl>
                                    <dt><h4>특징</h4></dt>
                                    <dd class="p-b-20">법적 권한을 가진 차량기술사의 평가서 발급 및 사고/침수 진단에 대한 보증프로그램 포함</dd>

                                    <dt><h4>내용</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>차검사 진단서를 토대로 차량기술사가 차량의 가치 평가</li>
                                            <li>보험사고, 손해사정 등의 차량 관련 분쟁에서 법률상 기준이 되는 차량 가치 평가는 차량기술사만이 가능</li>
                                            <li>차검사 평가서는 차검사 진단서를 기반으로 작성되므로 차검사 진단과 함께 신청하거나 발급 이후 추가 신청 가능</li>
                                            <li>차검사 평가서는 법률 분쟁(차량 관련 문제)시 중요한 자료로 효력 발생</li>
                                        </ul>
                                    </dd>

                                    <dt><h4>절차</h4></dt>
                                    <dd class="p-b-20">
                                        <div class="block bordered">

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_01.png') }}
                                                <h4>온라인 상품 구매</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_06.png') }}
                                                <h4>차량기술사가<br>차검사 진단서 내용 검토</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_04.png') }}
                                                <h4>차검사 평가서 발행<br>(업무시간 기준 30분 이내)</h4>
                                            </div>

                                        </div>
                                    </dd>

                                    <dt><h4>보증</h4></dt>
                                    <dd class="p-b-20">평가서 내용의 오류 또는 그로 인한 피해 발생 시</dd>

                                    <dt><h4>보증범위</h4></dt>
                                    <dd class="p-b-20 c-blue">발급일로부터 90일 또는 주행거리 기준 5천km 이내, 명시된 내용에 한함</dd>

                                    <dt><h4>보증절차</h4></dt>
                                    <dd class="p-b-20">
                                        <div class="block bordered">

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_07.png') }}
                                                <h4>고객센터 접수</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_05.png') }}
                                                <h4>수리보증 여부 검토</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_08.png') }}
                                                <h4>수리보증프로그램 진행</h4>
                                            </div>

                                        </div>
                                    </dd>

                                    <dt><h4>유의사항</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>해당 삼품은 특성상 발급 후 취소 및 환불 불가</li>
                                            <li>발급 시 주문자에게 SMS, 이메일, 푸시 등의 방법으로 알림</li>
                                        </ul>
                                    </dd>

                                </dl>


                            </div>

                            <div role="tabpanel" class="tab-pane" id="home2">

                            </div>

                            <div role="tabpanel" class="tab-pane" id="home3">

                            </div>


                        </div>
                    </div>


                </div>

            </div>

        </div>
    </section>

@endsection
