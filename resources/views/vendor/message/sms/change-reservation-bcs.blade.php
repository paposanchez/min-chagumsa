{{--예약변경 BCS 문자--}}
[차검사 예약 변경]

주문자명 : {{ $orderer_name }}
주문번호 : {{ $order_num }}
변경일시 : {{ date('Y년 m월 d일 H시', strtotime($enter_date)) }}

예약일정 확인 및 확정 진행해 주십시오. 주문신청 24시간 경과 후 예약은 자동으로 확정됩니다. (주말 및 공휴일 제외)