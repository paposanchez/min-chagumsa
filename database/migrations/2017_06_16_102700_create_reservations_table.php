<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->bigInteger('orders_id')->unsigned()->index('fk_reservations_orders1_idx');
			$table->bigInteger('garage_id');
			$table->dateTime('reservation_at')->comment('입고희망일');
			$table->timestamps();
			$table->bigInteger('created_id')->comment('예약생성자 아이디');
			$table->bigInteger('updated_id')->nullable()->comment('예약확정자 아이디');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
