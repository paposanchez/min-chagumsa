<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_features', function(Blueprint $table)
		{
			$table->bigInteger('orders_id')->unsigned();
			$table->integer('features_id')->unsigned()->comment('차량옵션 코드번호');
			$table->primary(['orders_id','features_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_features');
	}

}
