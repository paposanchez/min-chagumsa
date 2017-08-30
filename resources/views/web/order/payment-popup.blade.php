<!doctype html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>차검사</title>

        <link rel="stylesheet" href="//webtx.tpay.co.kr/css/nyroModal.tpay.custom.css" type="text/css" media="screen" />
        <script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery-1.7.2.js"></script>
        <script type="text/javascript">var resultUrl = "/order/payment-result";</script>
    </head>

    <body>
    <div style="visibility: hidden;">
    <div>
        <form id="transMgr" name="transMgr" method="post" action="{{ $payActionUrl }}/webTxInit" class="nyroModal" target="_blank">
            <input type="hidden" name="payType" value="1">
            <input type="hidden" name="ediDate"	value="{{ $ediDate }}">
            <input type="hidden" name="encryptData" value="{{ $encryptData }}">
            <input type="hidden" name="userIp"	value="{{ $request->server('SERVER_ADDR') }}">
            <input type="hidden" name="browserType" id="browserType">
            <input type="hidden" name="mallUserId" value="tpay_id">
            <input type="hidden" name="parentEmail">
            <input type="hidden" name="buyerAddr" value="서울특별시 구로구 디지털로 30길28, 마리오타워 9F">
            <input type="hidden" name="buyerPostNo" value="463400">
            <input type="hidden" name="mallIp" value="{{ $request->server('SERVER_ADDR') }}">
            <input type="hidden" name="mallReserved" value="MallReserved">
            <input type="hidden" name="vbankExpDate" value="{{ $vbankExpDate }}">
            <input type="hidden" name="rcvrMsg" value="rcvrMsg">
            <input type="hidden" name="prdtExpDate" value="20151231">
            <input type="hidden" name="resultYn" value="Y">
            <input type="hidden" name="quotaFixed" value="">
            <input type="hidden" name="domain" value="{{ $payLocalUrl }}">
            <input type="hidden" name="payMethod" id="payMethod" value="{{ $payMethod }}">
            <input type="hidden" id="transTypeN" name="transType" value="0">
            <input type="hidden" name="mid" value="{{ $mid }}" readonly="readonly">

            <input type="hidden" name="socketYn" value="N">{{-- TX 사용여부: Y/N --}}
            <input type="hidden" name="socketReturnURL" value="{{ $payLocalUrl }}/order/payment-result">
            <input type="hidden" name="retryUrl" value="{{ $payLocalUrl }}/order/pay-callback">
            <input type="text" name="goodsName" value="{{ $product_name }}" readonly>
            <input type="text" name="amt" value="{{ $amt }}" readonly >
            <input type="text" name="moid" value="{{ $moid }}" readonly>
            <input type="text" name="buyerName" value="{{ $buyerName }}" readonly>
            <input type="text" name="buyerTel" value="{{ $buyerTel }}" readonly>
            <input type="text" name="buyerEmail" value="{{ $buyerEmail }}" readonly>
        </form>
    </div>

    <script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery.nyroModal.tpay.custom.js"></script>
    <script type="text/javascript" src="//webtx.tpay.co.kr/js/client.tpay.webtx.js"></script>

    <script>
        $(function () {
            //결제결과 받는 URL
            $("#transMgr").submit();
        });

        function tPayClose(){
            if($("#iframeUrlSendBox").length==false){

            }else{
                $("#iframeUrlSendBox").remove();
            }

            parent.paymentClose(); //결제모달 닫기

            var tpay = $.nmTop();
            if(tpay!=undefined){
                $.nmTop().close();
            }else{
                document.location.reload();
            }
        }
    </script>

</body>
</html>