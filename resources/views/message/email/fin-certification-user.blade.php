{{--인증서 발급완료 사용자 메일--}}
@component('mail::message')
"[차검사 인증 안내]

신청하신 차검사 인증이 완료되었습니다. 차검사 홈페이지에서 로그인 후 My 인증서에서 확인하실 수 있습니다.

인증서 번호 : {{ $certificate_num }}
인증서 보기 : {{ $certificate_url }}



본 메일은 발신전용입니다. 궁금하신 내용은 아래 차검사 사이트의 고객센터 혹은 문의전화를 이용해 주세요.

차검사 www.chagumsa.com
문의전화 1833-6889"
@endcomponent