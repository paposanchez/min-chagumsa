<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text("answered")->nullable();
            /**
             * FAQ 그룹: U- 회원관련 P- 결제관련, C-인증서관련
             * FAQ 구분: R- 가입/탈퇴, L- 로그인, I- 아이디어/비밀번호, M- 회원정보관리,
             * P- 결제, O- 주문상태, F- 환불규정, G - 가이드
             */
            $table->enum('faq_group', ['U', 'P', 'C', ''])->default('');
            $table->enum("faq_div", ['R', 'L', 'I', 'M', 'P', 'O', 'F','G', ''])->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
