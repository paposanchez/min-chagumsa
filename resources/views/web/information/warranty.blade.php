@extends( 'web.layouts.default' )

@section( 'content' )
    <section id="content" class="content-alt">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block  text-center m-t-10  m-b-20">

                        <h1 class="c-white">차검사 보증</h1>
                        <hr class="line dark">
                        <h3 class="c-white c-light">제조사 수리 보증이 끝나도 계속 보증 받을 수 있는 방법!</h3>
                        <h6 class="c-white c-light">자동차 진단서만 있다면 1년 동안 걱정 없이 수리 보증 받으세요.</h6>
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
                            <h3 class="c-blue">국산 15만원 / 수입 25만원</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>
                                {{ Html::image('/assets/img/sub_images/title-icon_01-03.png') }}
                            </p>
                            <h5 class="c-gray">유효</h5>
                            <h3 class="c-blue">6개월 이내</h3>
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
                                                  data-toggle="tab">차검사 보증</a></li>
                            <li><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">보증범위</a></li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="home1">

                                <dl>
                                    <dt><h4>특징</h4></dt>
                                    <dd class="p-b-20">차검사 진단서에 기반해 보증서 발급 및 무상 수리 보증</dd>

                                    <dt><h4>내용</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>차검사 진단서를 토대로 수리가 필요한 항목의 수리 비용을 지원</li>
                                            <li>수리 비용 지원, 보증기간 내에서 수리 비용만큼 차감
                                            </li>
                                            <li>수리 보증은 전국의 차검사 지정 정비소(보취카서비스)에서 편리하게 이용 가능</li>
                                            <li>해당 내용은 차검사 진단서를 기반으로 작성되므로 차검사 진단과 함께 신청하거나 발급 이후 추가 신청이 가능</li>
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
                                                {{ Html::image('/assets/img/sub_images/body-icon_04.png') }}
                                                <h4>차검사 보증프로그램<br>가입 및 차검사 보증서 발급<br>(업무시간 기준 10분 이내)</h4>
                                            </div>

                                        </div>
                                    </dd>

                                    <dt><h4>보증</h4></dt>
                                    <dd class="p-b-20">차검사 진단서를 기반으로 해당 차량의 수리가 필요할 시</dd>

                                    <dt><h4>보증범위</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li class="c-blue">발급일로부터 1년 이내 유효</li>
                                            <li class="c-blue">최대 200만원 한도 내 수리비용 지원(상세 내용은 차검사 보증 범위에 명시)</li>
                                        </ul>
                                    </dd>


                                    <dt><h4>보증절차</h4></dt>
                                    <dd class="p-b-20">
                                        <div class="block bordered">

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_07.png') }}
                                                <h4>고객센터에<br>접수</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_05.png') }}
                                                <h4>수리보증 여부<br>검토</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_03.png') }}
                                                <h4>정비소 입고</h4>
                                            </div>

                                            {{ Html::image('/assets/img/sub_images/arrow.png') }}

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/body-icon_08.png') }}
                                                <h4>차량 수리</h4>
                                            </div>

                                        </div>
                                    </dd>

                                    <dt>
                                        <ul class="clist clist-angle">
                                            <li class="c-gray">차검사 지정 정비소</li>
                                        </ul>
                                    </dt>
                                    <dd class="p-b-20">
                                        <div class="block bordered">

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/logo_01.png') }}
                                                <h4>1,300여 개</h4>
                                            </div>

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/logo_02.png') }}
                                                <h4>800여 개</h4>
                                            </div>

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/logo_03.png') }}
                                                <h4>500여 개</h4>
                                            </div>

                                            <div class="">
                                                {{ Html::image('/assets/img/sub_images/logo_04.png') }}
                                                <h4>300여 개</h4>
                                            </div>

                                        </div>
                                    </dd>

                                    <dt><h4>유의사항</h4></dt>
                                    <dd class="p-b-20">
                                        <ul class="clist clist-angle">
                                            <li>해당 상품은 보증이력 최초 발생전까지 취소 가능</li>
                                            <li>제조사 워런티가 진행중인 차량은 해당 워런티 종료 후 차검사 보증을 순차 적용(중복 적용 불가)</li>
                                        </ul>
                                    </dd>

                                </dl>


                            </div>

                            <div role="tabpanel" class="tab-pane" id="home2">

                            </div>

                        </div>
                    </div>


                </div>

            </div>

        </div>
    </section>

@endsection
