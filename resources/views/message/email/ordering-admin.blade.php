@component('mail::message')
    차검사 결제 완료에 따른 알림 메일입니다.

    주문자 : {{ $user_name }}
    주문일시 : {{ $enter_date }}
    입고일시 : {{ $reservation_date }}
    입고대리점 : {{ $garage }}
    결제방식 : {{ $type }}
    결제금액 : {{ number_format($price )}}원
@endcomponent