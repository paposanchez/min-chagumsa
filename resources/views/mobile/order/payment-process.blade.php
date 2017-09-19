<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon" href=""/>
    <link rel="apple-touch-startup-image" href="" />

    {{ Html::script(Helper::assets( 'js/app.js' )) }}


</head>
<body style="background-color: #fafbfc; color: #444444;">
{{--<div style="visibility: hidden;">--}}
<div class="selectList" style="visibility: hidden;">
    <form id="transMgr" name="transMgr" method="post" action="{{ $payActionUrl }}/webTxInit">

        <input type="hidden" name="payMethod" id="payMethod" value="{{ $payMethod }}">
        <input type="hidden" id="transTypeN" name="transType" value="0">
        <input type="hidden" name="goodsName" value="{{ $product_name }}" readonly>
        <input type="hidden" name="amt" value="{{ $amt }}" readonly >
        <input type="hidden" name="moid" value="{{ $moid }}" readonly>
        <input type="hidden" name="mallUserId" value="{{ Auth::user()->email }}">
        <input type="hidden" name="buyerName" value="{{ $buyerName }}" readonly>
        <input type="hidden" name="buyerTel" value="{{ $buyerTel }}" readonly>
        <input type="hidden" name="buyerEmail" value="{{ $buyerEmail }}" readonly>
        <input type="hidden" name="prdtExpDate" value="">
        <input type="hidden" name="mid" value="{{ $mid }}" readonly="readonly">
        <input type="hidden" name="returnUrl" class="largeInput" value="{{ $payLocalUrl }}/order/payment-result" readonly="readonly">
        {{-- todo 결제 취소 확인 해야 함 --}}
        <input type="hidden" name="cancelUrl" class="largeInput" value="{{ $payLocalUrl }}/order/complete?cancel=1" readonly="readonly">
        <input type="hidden" name="vbankExpDate" value="{{ $vbankExpDate }}">
        <input type="hidden" name="connType" value="0">
        <input type="hidden" name="appPrefix" value="ibWebTest">


        <input type="hidden" name="payType" value="1"><!-- 결제형태 -->
        <input type="hidden" name="ediDate"	value="{{ $ediDate }}"><!-- 결제일 -->
        <input type="hidden" name="encryptData" value="{{ $encryptData }}"><!-- 암호화 검증 데이터 -->
        <input type="hidden" name="userIp"	value="{{ $request->server('REMOTE_ADDR') }}"><!-- User IP Address -->
        <input type="hidden" name="browserType" id="browserType" value="">
        <input type="hidden" name="mallReserved" value="MallReserved">

        <input type="submit">
    </form>
</div>

{{--<script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery.nyroModal.tpay.custom.js"></script>--}}
{{--<script type="text/javascript" src="//webtx.tpay.co.kr/js/client.tpay.webtx.js"></script>--}}

<script type="text/javascript">
    $(function () {
        $("#transMgr").submit();
    })

</script>
</body>
</html>