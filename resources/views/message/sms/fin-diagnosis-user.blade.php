{{--인증서 발급 사용자 문자--}}
@component('mail:message')
[차검사 진단 완료]

차검사 진단이 완료되었습니다. 진단 내용을 토대로 인증서가 발급될 예정이며, 상태는 차검사 홈페이지의 My 인증서에서 확인하실 수 있습니다.

인증서 번호 : {{ $order_number }}
인증서 보기 : www.chagumsa.com

고객센터 1833-6889

@component('mail::panel')
    This is the panel content.
@endcomponent

@endcomponent