<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentCancelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cancels', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();

            $table->string('payMethod', 10)->nullable();
            $table->string('ediDate', 14)->nullable();
            $table->string('returnUrl', 255)->nullable();
            $table->string('resultMsg', 255)->nullable();
            $table->string('cancelDate', 14)->nullable();
            $table->string('cancelTime', 20)->nullable();
            $table->string('resultCd', 10)->nullable();
            $table->string('cancelNum', 10)->nullable();
            $table->bigInteger('cancelAmt')->default(0);
            $table->string('moid', 40)->nullable();
            $table->bigInteger('orders_id')->default(0);

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
        Schema::dropIfExists('payment_cancels');
    }
}
