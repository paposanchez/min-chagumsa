@component('mail::message')
    차검사 상담 신청에 따른 알림 메일입니다.

    상담자 : {{ $name }}
    연락처 : {{ $mobile }}
    이메일 : {{ $email }}
    상담내용 : {{ $content }}
@endcomponent