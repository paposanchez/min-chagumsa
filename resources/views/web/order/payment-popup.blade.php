<!doctype html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>카검사</title>

        <link rel="stylesheet" href="//webtx.tpay.co.kr/css/nyroModal.tpay.custom.css" type="text/css" media="screen" />
        <script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery-1.7.2.js"></script>

    </head>

    <body>
    <div style="visibility: hidden;">
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
            <input type="hidden" name="socketReturnURL" value="{{ $payLocalUrl }}/payment/pay-result">
            <input type="hidden" name="retryUrl" value="{{ $payLocalUrl }}/paymemt/pay-callback">
            <table class="table">
                <colgroup>
                    <col width="120px">
                    <col width="*">
                </colgroup>
                <tbody>

                <tr>
                    <td class='alg_c'>상품명</td>
                    <td><input type="text" name="goodsName" value="{{ $product_name }}" readonly></td>
                </tr>
                <tr>
                    <td class='alg_c'>상품가격</td>
                    <td><input type="text" name="amt" value="{{ $amt }}" readonly > 원
                    </td>
                </tr>

                <tr>
                    <td class='alg_c'>상품주문번호</td>
                    <td><input type="text" name="moid" value="{{ $moid }}" readonly>	</td>
                </tr>


                <tr>
                    <td class='alg_c'>구매자명</td>
                    <td><input type="text" name="buyerName" value="{{ $buyerName }}" readonly></td>
                </tr>

                <tr>
                    <td class='alg_c'>구매자연락처((-)없이 입력)</td>
                    <td><input type="text" name="buyerTel" value="{{ $buyerTel }}" readonly></td>
                </tr>

                <tr>
                    <td class='alg_c'>구매자메일주소</td>
                    <td><input type="text" name="buyerEmail" value="{{ $buyerEmail }}" readonly></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <div class='ipt_line wid45'>
                            <button type="button" id="submitBtn" class='btns btns_green wid45' style='display:inline-block;'>결제하기</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery.nyroModal.tpay.custom.js"></script>
    <script type="text/javascript" src="//webtx.tpay.co.kr/js/client.tpay.webtx.js"></script>
    <script type="text/javascript">var resultUrl = "/order/payment-result";</script>
    <script>
        $(function () {
            //결제결과 받는 URL
           $("#transMgr").submit();
        })

    </script>

</body>
</html>