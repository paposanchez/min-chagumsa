<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->foreign('car_id', 'fk_orders_cars')->references('id')->on('cars')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('item_id', 'fk_orders_items')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('purchase_id', 'fk_orders_purchase')->references('id')->on('purchases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->dropForeign('fk_orders_cars');
			$table->dropForeign('fk_orders_items');
			$table->dropForeign('fk_orders_purchase');
		});
	}

}
