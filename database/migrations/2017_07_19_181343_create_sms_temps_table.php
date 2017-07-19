<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_temps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('mobile_num', 20)->comment("핸드폰 번호");
            $table->string('confirm_msg', 30)->comment("SMS로 전송된 인증번호");
            $table->integer('send_time')->comment("SMS 메세지 전송 unixtime");
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
        Schema::dropIfExists('sms_temps');
    }
}
