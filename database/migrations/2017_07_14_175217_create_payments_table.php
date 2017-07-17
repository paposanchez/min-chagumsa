<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();

            $table->string("payMethod", 10)->comment("결제수단, CARD – 신용카드결제 BANK – 계좌이체\nVBANK – 가상계좌 CELLPHONE – 휴대폰결제 * 공백(\“\”) 입력시 통합모드");
            $table->string("transType", 2)->comment("에스크로여부, 0: 일반, 1: 에스크로");
            $table->string("goodsName", 40)->comment("상품명");
            $table->integer("amt")->comment("금액");
            $table->string("moid", 40)->comment("상점주문번호"); //복합키이다.
            $table->string("mallUserId", 20)->comment("구매자ID");
            $table->string("buyerName", 30)->comment("구매자성명");
            $table->string("buyerTel", 20)->comment("구매자연락처");
            $table->string("buyerEmail", 60)->nullable()->comment("구매자email");
            $table->string("mallIp", 20)->comment("상점IP");
            $table->string("rcvrMsg", 255)->nullable()->comment("수취인전달메세지");
            $table->string("ediDate", 14)->comment("암호화된 시간");
            $table->string("encryptData", 600)->comment("암호화된 거래정보");
            $table->string("userIp", 20)->comment("구매자IP");
            $table->string("resultYn", 1)->nullable()->comment("결제결과 페이지 표시");
            $table->string("quotaFixed", 2)->nullable()->comment("카드할부 개월값 고정");
            $table->string("domain", 30)->comment("현재 도메인 정보");
            $table->string("socketYn", 1)->comment("Tx모듈 사용여부\nY: 사용\nN: 미사용\nNULL: tPayLite 모드로 구성됨");
            $table->string("socketReturnURL", 255)->comment("결제요청/응답 페이지 URL");
            $table->string("retryUrl", 255)->nullable()->comment("결제 재통보 URL");
            $table->integer("supplyAmt")->default(0)->comment("공급가액");
            $table->integer("vat")->default(0)->comment("부가세");
            $table->string("billReqType", 1)->comment("빌링키 발행 시 승인여부\n0: 인증 (성공결과 0000)\n1: 인증+결제 (금액0원이상)\n빌링키 발행 시 승인여부 (성공결과 3001)");

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
        Schema::dropIfExists('payments');
    }
}
