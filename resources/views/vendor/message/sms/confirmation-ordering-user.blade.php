{{--예약확정 문자--}}
[차검사 예약 확정]

▶이용일시 : {{ date('Y년 m월 d일', strtotime($enter_date)) }}({{ $week_day }}) / {{ date('A', strtotime($enter_date)) }} {{ date('H시', strtotime($enter_date)) }}
▶입고대리점 : {{ $garage }}
▶주소 : {{ $address }}
▶문의전화 : {{ $tel }}

* 진단 시간은 1~2시간 정도 소요되며, 인증서에 차량 사진이 들어가기 때문에 세차 하시길 권하며, 차량등록증을 소지하고 입고하시기 바랍니다.

* 예약일에 방문이 어렵다면 해당 대리점으로 전화주세요. 예약 취소 및 변경을 도와 드리겠습니다.
