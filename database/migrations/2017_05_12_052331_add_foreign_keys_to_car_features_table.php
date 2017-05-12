<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('car_features', function(Blueprint $table)
		{
			$table->foreign('features_id', 'fk_car_features_features1')->references('id')->on('features')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('orders_id', 'fk_car_features_orders1')->references('id')->on('orders')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('car_features', function(Blueprint $table)
		{
			$table->dropForeign('fk_car_features_features1');
			$table->dropForeign('fk_car_features_orders1');
		});
	}

}
