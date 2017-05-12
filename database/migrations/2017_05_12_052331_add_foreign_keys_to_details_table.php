<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('details', function(Blueprint $table)
		{
			$table->foreign('model_id', 'fk_details_models1')->references('id')->on('models')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('details', function(Blueprint $table)
		{
			$table->dropForeign('fk_details_models1');
		});
	}

}
