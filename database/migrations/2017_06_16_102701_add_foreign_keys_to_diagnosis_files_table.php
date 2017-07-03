<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiagnosisFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diagnosis_files', function(Blueprint $table)
		{
			$table->foreign('diagnosis_detail_items_id', 'fk_diagnosis_files_diagnosis_detail_items1')->references('id')->on('diagnosis_detail_items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diagnosis_files', function(Blueprint $table)
		{
			$table->dropForeign('fk_diagnosis_files_diagnosis_detail_items1');
		});
	}

}
