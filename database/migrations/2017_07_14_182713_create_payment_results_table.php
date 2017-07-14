<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_results', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();

            $table->bigInteger('pyments_id')->comment("결페요청ID");

            $table->string("tid")->comment("거래번호");
            $table->string("stateCd")->comment("승인취소구분\n0:승인, 1:전취소, 2:후취소 3:가상계 좌발급 4:가상계좌입금기간만료");
            $table->string("authDate")->nullable()->comment("승인일자");
            $table->string("authCode")->nullable()->comment("승인번호");
            $table->string("fnCd")->nullable()->comment("결제카드사/은행, 코드값임");
            $table->string("fnName")->nullable()->comment("결제카드사명/은 행명");
            $table->string("resultCd")->comment("결제결과코드");
            $table->string("resultMsg")->comment("결제결과메시지");
            $table->string("cardQuota")->nullable()->comment("할부개월수");
            $table->string("cardNo")->nullable()->comment("카드번호");
            $table->string("cardPoint")->nullable()->comment("카드사포인트");
            $table->string("usePoint")->nullable()->comment("사용포인트");
            $table->string("balancePoint")->nullable()->comment("잔여포인트");
            $table->string("BID")->nullable()->comment("빌링키");
            $table->string("cashReceiptType")->nullable()->comment("현금영수증 종류");
            $table->string("receiptTypeNo")->nullable()->comment("현금영수증 번호");
            $table->string("cashNo")->nullable()->comment("승인번호. 계좌이체, 가상계좌 입금시");
            $table->string("cashTid")->nullable()->comment("발급TID. 계좌이체, 가상계좌 입금시");
            //아래 필드는 중복되나, PG사에서 오는 정보임.
            $table->string("ediDate")->comment("암호화된 시간. 복호화에 사용");
            $table->string("mid")->comment("상점ID");
            $table->string("moid")->comment("상점주문번호. 복호화해서 상점측 DB에 저장 된 값과 비교");
            $table->string("amt")->comment("금액. 복호화해서 상점측 DB에 저장 된 값과 비교");
            $table->string("payMethod")->comment("결제수단");
            $table->string("mallUserId")->comment("구매자아이디");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_results');
    }
}
