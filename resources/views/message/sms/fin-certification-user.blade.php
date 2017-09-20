{{--인증서 발급 사용자 문자--}}
@component('mail:message')
[차검사 인증 안내]

차검사 인증이 완료되었습니다. 차검사 홈페이지에서 로그인 후 My 인증서에서 확인하실 수 있습니다.

인증서 번호 : {{ $certificate_num }}
인증서 보기 : {{ $certificate_url }}

@component('mail::panel')
    This is the panel content.
@endcomponent

@endcomponent