<?php
/**
 * PG연동 팝업 view
 * User: muti
 * Date: 2017. 7. 20.
 * Time: PM 6:16
 */
?>

<?php
/**
 * 결제 요청 페이지
 * User: muti
 * Date: 2017. 7. 14.
 * Time: PM 9:10
 */
?>
@extends( 'web.layouts.payment' )

@section( 'content' )

    {{--<div id='sub_title_wrap'><h2>인증서 신청<div class='sub_title_shortCut'>Home <i class="fa fa-angle-right"></i> <span>인증서 신청</span></div></h2></div>--}}

    <div id='sub_wrap'>


        <div class='join_wrap'>

            {{--{!! Form::open(['method' => 'POST', 'action' => $payActionUrl, 'enctype' => "multipart/form-data", 'id' => 'payment-frm', 'target' => "_blank" ]) !!}--}}
            <form id="transMgr" name="transMgr" method="post" action="{{ $payActionUrl }} ?>/webTxInit" class="nyroModal" target="_blank">
                <input type="hidden" name="payType" value="1">
                <input type="hidden" name="ediDate"	value="{{ $ediDate }}">
                <input type="hidden" name="encryptData" value="{{ $encryptData }}">
                <input type="hidden" name="userIp"	value="{{ $_SERVER['REMOTE_ADDR'] }}">
                <input type="hidden" name="browserType" id="browserType">
                <input type="hidden" name="mallUserId" value="tpay_id">
                <input type="hidden" name="parentEmail">
                <input type="hidden" name="buyerAddr" value="서울특별시 구로구 디지털로 30길28, 마리오타워 9F">
                <input type="hidden" name="buyerPostNo" value="463400">
                <input type="hidden" name="mallIp" value="{{ $_SERVER['SERVER_ADDR'] }}">
                <input type="hidden" name="mallReserved" value="MallReserved">
                <input type="hidden" name="vbankExpDate" value="{{ $vbankExpDate }}">
                <input type="hidden" name="rcvrMsg" value="rcvrMsg">
                <input type="hidden" name="prdtExpDate" value="20151231">
                <input type="hidden" name="resultYn" value="Y">
                <input type="hidden" name="quotaFixed" value="">
                <input type="hidden" name="domain" value="{{ $payLocalUrl }}">
                <input type="hidden" name="payMethod" id="payMethod" value="{{ $payment_type }}">
                <input type="hidden" id="transTypeN" name="transType" value="0">
                <input type="hidden" id="amt" name="amt" value="{{ $amt }}">



                <table class="table">
                    <colgroup>
                        <col width="120px">
                        <col width="*">
                    </colgroup>
                    <tbody>

                    <tr>
                        <td>상품명<font color="red">(*)</font></td>
                        <td><input type="text" name="goodsName" value="t_상품명"></td>
                    </tr>
                    <tr>
                        <td>상품가격<font color="red">(*)</font></td>
                        <td><input type="text" name="amt" value="<?=$amt?>" > 원<input type="button" value="금액 변경" onclick="changeAmt();"  class="button blue small"/>
                            <br/> <font size="1pt" style="font-weight: bold;"> * 상품가격  변경시 금액변경 버튼을 눌러주시기 바랍니다.</font>
                        </td>
                    </tr>

                    <tr>
                        <td>상품주문번호</td>
                        <td><input type="text" name="moid" value="<?=$moid?>">	</td>
                    </tr>

                    <tr>
                        <td>회원사아이디<font color="red">(*)</font></td>
                        <td><input type="text" name="mid" value="<?=$mid ?>" readonly="readonly"></td>
                    </tr>

                    <tr>
                        <td>구매자명</td>
                        <td><input type="text" name="buyerName" value="t_구매자명"></td>
                    </tr>

                    <tr>
                        <td>구매자연락처((-)없이 입력)</td>
                        <td><input type="text" name="buyerTel" value="0212345678"></td>
                    </tr>

                    <tr>
                        <td>구매자메일주소<font color="red">(*)</font></td>
                        <td><input type="text" name="buyerEmail" value="aaa@bbb.com"></td>
                    </tr>
                    <tr>
                        <td>tx 사용</td>
                        <td>
                            <select name="socketYn" id="socketYn" style="height: 25px;">
                                <option value="N">미사용</option>
                                <option value="Y">사용</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>소캣방식 리턴URL</td>
                        <td><input type="text" name="socketReturnURL" value="{{ $payLocalUrl }}/pay-test/sock"></td>
                    </tr>
                    <tr>
                        <td>retryURL(재통보)</td>
                        <td><input type="text" name="retryUrl" value="{{ $payLocalUrl }}/pay-test/retry"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;"><input type="button" id="submitBtn" value="결제 전송(btn)" class="button blue medium"></td>
                    </tr>
                    </tbody>
                </table>

            </form>
        </div>
    </div>

@endsection


@push( 'header-script' )
<link rel="stylesheet" href="//webtx.tpay.co.kr/css/nyroModal.tpay.custom.css" type="text/css" media="screen" />
<script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery-1.7.2.js"></script>
@endpush

@push( 'footer-script' )
<script type="text/javascript" src="//webtx.tpay.co.kr/js/jquery.nyroModal.tpay.custom.js"></script>
<script type="text/javascript" src="//webtx.tpay.co.kr/js/client.tpay.webtx.js"></script>

<script>
    var resultUrl = "./payReqResult.php";	//결제결과 받는 URL
</script>

@endpush