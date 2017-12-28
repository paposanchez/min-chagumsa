{{--주문취소 사용자 이메일--}}
@component('mail::message')
[차검사 주문 취소]

차검사 주문이 취소되었습니다.

입고일시 : {{ date('Y년 m월 d일 H시', strtotime($enter_date)) }}
입고대리점 : {{ $garage }}
결제금액 : {{ number_format($price) }}원

다시 차검사 인증서를 신청하려면 차검사 사이트(www.chagumsa.com)의 '인증서 신청'을 이용해 주세요.

본 메일은 발신전용입니다. 궁금하신 내용은 아래 차검사 사이트의 고객센터 혹은 문의전화를 이용해 주세요.

차검사 www.chagumsa.com
문의전화 1833-6889
@endcomponent