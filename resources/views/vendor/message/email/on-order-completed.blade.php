@component('mail::message')
    ##[차검사 주문 신청 완료]
    
    차검사 주문 신청이 완료되었습니다.

    입고일시 : {{ date('Y년 m월 d일 H시', strtotime($enter_date)) }}
    입고대리점 : {{ $garage }}
    결제금액 : {{ number_format($price) }}원

    [안내사항]
    
    입고대리점 상황에 따라 입고일시는 변경될 수 있으며, 변경 시 입고대리점에서 연락 드릴 예정입니다.
    본 메일은 발신전용입니다. 궁금하신 내용은 아래 차검사 사이트의 고객센터 혹은 문의전화를 이용해 주세요. 
    
    차검사 www.chagumsa.com 
    문의전화 1833-6889
@endcomponent