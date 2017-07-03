<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettlementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settlements', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->comment('정산대상');
			$table->decimal('amount', 10, 1)->default(0.0)->comment('총정산금액');
			$table->text('description', 65535)->nullable()->comment('설명');
			$table->integer('status_cd')->comment('정산여부');
			$table->bigInteger('created_id')->comment('정산생성자');
			$table->bigInteger('updated_id')->unsigned()->nullable()->comment('정산처리자');
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
		Schema::drop('settlements');
	}

}
