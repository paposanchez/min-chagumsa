<?php
/**
 * 결제결과 페이지
 * 결제 완료 시 본 창은 꺼지면서 부모창을 complete로 변경해야 함.
 * User: muti
 * 필수 Params: datekey, cars_id, item_choice, payment_method
 */
?>
@extends( 'web.layouts.payment' )

@section( 'content' )


@endsection

@push( 'header-script' )
<link rel="stylesheet" href="//webtx.tpay.co.kr/css/nyroModal.tpay.custom.css" type="text/css" media="screen" />
<script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery-1.7.2.js"></script>
@endpush

@push( 'footer-script' )
<script type="text/javascript">

    $(function () {
        alert("{{ $result }}");
        parent.paymentSubmit("{{ $decMoid }}", "{{ $event }}", 1);
        //todo 결제페이지를 결제완료페이지로 연동하는 method를 구성해야 함
    });

</script>
@endpush
