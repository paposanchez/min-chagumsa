<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('car_features', function(Blueprint $table)
		{
			$table->integer('features_id')->unsigned()->index('fk_car_features_features1_idx');
			$table->bigInteger('orders_id')->unsigned()->index('fk_car_features_orders1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('car_features');
	}

}
