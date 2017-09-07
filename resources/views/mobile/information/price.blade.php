@extends( 'mobile.layouts.default' )

@section( 'content' )

<div id='sub_title_wrap'>서비스 소개</div>

<div class='br20'></div>


<div id='sub_wrap'>

    <div class='intro3_title'>서비스 신청절차</div>

    <div class='intro3_step_box'>
        <div>
            <strong>01</strong> 차량정보 입력
        </div>
        <p>
            <span>간단한 차량정보를 입력합니다.</span>
            - 자동차제조사, 모델, 트림 정보 입력<br>
            - 자동차등록번호 입력<br>
            - 차량옵션 입력<br>
            &nbsp;&nbsp;※ 차량가격산정에 영향을 주므로 기본옵션 외 차량소유자가 설치한 옵션을 정확히 입력해 주세요
        </p>
    </div>

    <div class='intro3_step_box'>
        <div>
            <strong>02</strong>차량검사 장소 및 시간 선택
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
            <strong>03</strong>결제하기
        </div>
    </div>

    <div class='intro3_step_box'>
        <div>
            <strong>04</strong>차량입고
        </div>
        <p>
            <span>예약이 확정된 시간에 신청 차량과 자동차등록증을 가지고 방문하시기 바랍니다.</span>
            - 차량 내외부 점검, 사고유무 점검, 침수여부 점검, 추가 장착 옵션 점검 및 엔진 등 주요장치 진단<br>
            - 1시간 소요 예정
        </p>
    </div>

    <div class='intro3_step_box' style='border-bottom:0;'>
        <div>
            <strong>05</strong>인증서 발급 및 공인
        </div>
        <p>
            <span>자동차 가치평가 분야에 전문적인 자동차기술사가 인증서를 발급합니다. </span>
            - 차량모델, 세부트림 및 히스토리, 차량 성능 기반 평가<br>
            - 1개월 / 2000km 까지 보증<br>
            - 중고차 판매 사이트 및 SNS에 공유 가능한 인증서 링크 제공
        </p>
    </div>

</div>

@endsection


@push( 'header-script' )

@endpush

@push( 'footer-script' )

<script type="text/javascript">
    $(function () {
        $('.intro3_tab').mousedown(function(){
            $('.tab_on').removeClass('tab_on');
            $('.intro3_tab_cont').hide();
            $(this).addClass('tab_on');
            $('.'+$(this).attr('id')).show();
        });
    });
</script>

@endpush