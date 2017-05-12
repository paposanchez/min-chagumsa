<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSettlementFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settlement_features', function(Blueprint $table)
		{
			$table->foreign('orders_id', 'fk_settlement_features_orders1')->references('id')->on('orders')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('settlements_id', 'fk_settlement_features_settlements1')->references('id')->on('settlements')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settlement_features', function(Blueprint $table)
		{
			$table->dropForeign('fk_settlement_features_orders1');
			$table->dropForeign('fk_settlement_features_settlements1');
		});
	}

}
