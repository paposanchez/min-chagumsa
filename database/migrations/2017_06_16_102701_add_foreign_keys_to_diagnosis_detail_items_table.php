<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiagnosisDetailItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diagnosis_detail_items', function(Blueprint $table)
		{
			$table->foreign('diagnosis_detail_id', 'fk_diagnosis_detail_items_diagnosis_detail1')->references('id')->on('diagnosis_detail')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diagnosis_detail_items', function(Blueprint $table)
		{
			$table->dropForeign('fk_diagnosis_detail_items_diagnosis_detail1');
		});
	}

}
