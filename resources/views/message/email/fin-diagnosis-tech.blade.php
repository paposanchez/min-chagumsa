{{--진단완료 기술사 이메일--}}
@component('mail::message')
메일제목
[차검사 진단완료] 차검사 인증을 진행해 주십시오.

메일 내용
아래 차량의 진단이 완료 되었습니다.
차검사 인증을 진행해 주십시오.

- 주문자명 : {{ $orderer_name }}
- 주문번호 : {{ $order_num }}
- 정비소명 : {{ $garage }}
@endcomponent