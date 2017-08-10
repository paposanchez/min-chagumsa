@extends( 'web.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'><h2>차검사 소개<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>차검사 소개</span></div></h2></div>

<div id='sub_wrap'>

    <ul class='menu_tab_wrap'>
        <li><a class='' href='{{ route("information.index") }}'>서비스 소개</a></li>
        <li><a class='' href='{{ route("information.certificate") }}'>차검사인증서란?</a></li>
        <li><a class='' href='{{ route("information.guide") }}'>특징 및 절차</a></li>
        <li><a class='select' href='{{ route("information.price") }}'>신청절차 및 수수료</a></li>
    </ul>

    <div class='br20'></div>
    <div class='br20'></div>

    <div class='intro3_title'>서비스 신청절차</div>

    <div class='intro3_step_box'>
        <div>
            <strong>STEP01</strong>차량정보 입력
        </div>
        <p>
            <span>간단한 차량정보를 입력합니다.</span>
            - 자동차제조사, 모델, 트림 정보 입력<br>
            - 자동차등록번호 입력<br>
            - 차량옵션 입력 <br>
            &nbsp;&nbsp;※ 차량가격산정에 영향을 주므로 기본옵션 외 차량소유자가 설치한 옵션을 정확히 입력해 주세요
        </p>
    </div>

    <div class='intro3_step_box'>
        <div>
            <strong>STEP02</strong>차량검사 장소 및<br>시간 선택
        </div>
        <p>
            <span>전국 400개 BOSCH 카정비소에서 정밀한 진단이 가능합니다. </span>
            - 가까운 BOSCH 카서비스 선택<br>
            - 진단 일정 예약<br>
            &nbsp;&nbsp;※ 원하는 시간을 선택하시면 진단담당자의 전화 확인 후 예약일정이 확정됩니다
        </p>
    </div>

    <div class='intro3_step_box'>
        <div>
            <strong>STEP03</strong>결제하기
        </div>
        <p>
            <span class='br30'>결제를 진행합니다.</span>
        </p>
        <button class='btns btns2' type="button" id="find_garage">정비소 찾아보기</button>
    </div>

    <div class='intro3_step_box'>
        <div>
            <strong>STEP04</strong>차량 입고
        </div>
        <p>
            <span>예약이 확정된 시간에 신청 차량과 자동차등록증을 가지고 방문하시기 바랍니다.</span>
            - 차량 내외부 점검, 사고유무 점검, 침수여부 점검, 추가 장착 옵션 점검 및 엔진 등 주요장치 진단<br>
            - 1시간 소요 예정
        </p>
    </div>

    <div class='intro3_step_box'>
        <div>
            <strong>STEP05</strong>인증서 발급 및<br>공인
        </div>
        <p>
            <span>자동차 가치평가 분야에 전문적인 자동차기술사가 인증서를 발급합니다. </span>
            - 차량모델, 세부트림 및 히스토리, 차량 성능 기반 평가<br>
            - 1개월 / 2000km 까지 보증<br>
            - 중고차 판매 사이트 및 SNS에 공유 가능한 인증서 링크 제공
        </p>
    </div>

    <div class='br30'></div>
    <div class='br30'></div>

    <div class='intro3_title'>인증서 발급수수료</div>
    <div class='br20'></div>
    <div class='para_type1'>
        신청 자동차 성능진단 및 가치산정발급수수료는 아래와 같습니다. 국산차와 수입차의 가격차는정확한 성능진단 시 진단장비 사용 및 진단비용과 보증수수료 차이를 반영한 금액입니다.
    </div><div class='br20'></div>

    <div class='board_wrap'>
        <table>
            <colgroup>
                <col style='width:15%;'>
                <col style='width:15%;'>
                <col style='width:20%;'>
                <col style='width:40%;'>
            </colgroup>
            <thead>
            <tr>
                <th colspan='2'>구분</th>
                <th class='alg_c'>인증수수료</th>
                <th class='alg_c'>인증서보장내역</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th rowspan='2'>국산차</th>
                <th>2,000cc 미만</th>
                <th>150,000원</th>
                <td rowspan='4' style='padding-left:30px;'>
                    - 품질등급 B 등급이상에 대해, 3개월 5000km 내 수리보장<br><br>
                    - 전국 500개 보쉬카서비스에서 수리가능함(자기 부담금 30,000원)<br><br>
                    - 보장범위는 품질인증서에서 양호로 진단된 범위 내
                </td>
            </tr>
            <tr>
                <th>2,000cc 이상</th>
                <th>200,000원</th>
            </tr>
            <tr>
                <th rowspan='2'>수입차</th>
                <th>2,000cc 미만</th>
                <th>300,000원</th>
            </tr>
            <tr>
                <th>2,000cc 이상</th>
                <th>400,000원</th>
            </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection

@push( 'header-script' )
@endpush

@push( 'footer-script' )
<script type="text/javascript">
    $(function (){
        $('#find_garage').click(function (){
            window.open("{{ route("information.find-garage") }}","", "location=no, width=700, height=450");
        });
    });
</script>

@endpush