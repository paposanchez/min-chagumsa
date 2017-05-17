<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('purchases', function(Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->string('transaction_id', 50)->nullable()->comment('결제번호');
            $table->integer('amount')->default(0);
            $table->char('type', 1)->comment('결제방법');
            $table->string('refund_name', 45)->nullable();
            $table->string('refund_account', 45)->nullable();
            $table->string('refund_bank', 45)->nullable();
            $table->integer('status')->comment('결제상태');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('purchases');
    }

}
