@extends( 'web.layouts.default' )

@section( 'content' )
<section id="content" class="content-alt">

        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="block text-center m-t-10  m-b-20" >
                                        <h5 class="c-white">서브텍스트</h5>
                                        <h1 class="c-white">차검사 진단</h1>
                                        <hr class="line dark">
                                        <h3 class="c-white c-light">복잡한 서류없이 고객님 신용만으로 간편한 대출</h3>
                                        <h6 class="c-white c-light">서브서브 테스트</h6>
                                </div>

                        </div>
                </div>

                <div class="card subnavigation">

                        <div class="card-body card-padding">

                                <div class="row">
                                        <div class="col-md-4 text-center">
                                                <p><img src="/assets/imgs/"></p>
                                                <h5 class="c-gray">대상</h5>
                                                <h3 class="c-blue">진단을 원하는 모든 차량</h3>
                                        </div>
                                        <div class="col-md-4 text-center">
                                                <h5 class="c-gray">금액</h5>
                                                <h3 class="c-blue">국산 10만원, 수입 15만원</h3>
                                        </div>
                                        <div class="col-md-4 text-center">
                                                <h5 class="c-gray">유효</h5>
                                                <h3 class="c-blue">발급일로부터 30일 이내</h3>
                                        </div>
                                </div>

                        </div>

                </div>


                <div class="card">

                        <div class="card-body card-padding">

                                <div role="tabpanel">

                                        <ul class="tab-nav text-center fw-nav" role="tablist">
                                                <li class="active"><a href="#home1" caria-controls="home1" role="tab" data-toggle="tab">상품소개</a></li>
                                                <li><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">상품약관</a></li>
                                                <li><a href="#home3" aria-controls="home3" role="tab" data-toggle="tab">진단항목</a></li>
                                        </ul>

                                        <div class="tab-content">

                                                <div role="tabpanel" class="tab-pane active" id="home1">

                                                        <dl>
                                                                <dt><h4>특징</h4></dt>
                                                                <dd class="p-b-20">300개 이상의 보쉬 네트워크를 통한 130여개 항목 점검 및 진단서 발급</dd>

                                                                <dt><h4>내용</h4></dt>
                                                                <dd class="p-b-20">
                                                                        <ul class="clist clist-angle">
                                                                                <li>원하는 정비소와 시간을 온라인으로 간편하게 선택 및 예약</li>
                                                                                <li>보쉬 인증 엔지니어가 130여개의 점검 항목을 정밀 진단(사고/침수 흔적 관련 점검 항목 포함, 부위별 사진 데이터 제공)</li>
                                                                                <li>차량 입고 후 최대 2시간내 차검사 진단서 발급(온라인 발급 및 조회, 다운로드 가능)</li>
                                                                                <li>발급된 차검사 진단서는 보증기간 내 보증프로그램에 의해 보호</li>
                                                                        </ul>
                                                                </dd>

                                                                <dt><h4>절차</h4></dt>
                                                                <dd class="p-b-20">
                                                                        <div class="block bordered">

                                                                                <div class="">
                                                                                        <img src="">
                                                                                        <h4>온라인 상품 구매 및 입고 예약</h4>
                                                                                </div>

                                                                        </div>
                                                                </dd>

                                                                <dt><h4>보증범위</h4></dt>
                                                                <dd class="p-b-20">300개 이상의 보쉬 네트워크를 통한 130여개 항목 점검 및 진단서 발급</dd>

                                                                <dt><h4>보증절차</h4></dt>
                                                                <dd class="p-b-20">
                                                                        <div class="block bordered">

                                                                                <div class="">
                                                                                        <img src="">
                                                                                        <h4>고객센터 접수</h4>
                                                                                </div>

                                                                                <img src="" class="">




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
