<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('models', function(Blueprint $table)
		{
			$table->foreign('brand_id', 'fk_models_brands1')->references('id')->on('brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('models', function(Blueprint $table)
		{
			$table->dropForeign('fk_models_brands1');
		});
	}

}
