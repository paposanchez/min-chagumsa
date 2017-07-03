<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('transaction_id', 50)->nullable()->comment('결제번호');
			$table->integer('amount')->default(0);
			$table->char('type', 1)->comment('결제방법');
			$table->string('refund_name', 45)->nullable();
			$table->string('refund_account', 45)->nullable();
			$table->string('refund_bank', 45)->nullable();
			$table->integer('status_cd')->comment('결제상태');
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
		Schema::drop('purchases');
	}

}
