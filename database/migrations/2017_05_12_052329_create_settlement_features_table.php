<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettlementFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settlement_features', function(Blueprint $table)
		{
			$table->bigInteger('settlements_id')->unsigned()->index('fk_settlement_features_settlements1');
			$table->bigInteger('orders_id')->unsigned()->index('fk_settlement_features_orders1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settlement_features');
	}

}
