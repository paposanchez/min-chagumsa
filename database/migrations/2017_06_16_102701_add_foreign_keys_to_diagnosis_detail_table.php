<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiagnosisDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diagnosis_detail', function(Blueprint $table)
		{
			$table->foreign('diagnosis_details_id', 'fk_diagnosis_detail_diagnosis_details1')->references('id')->on('diagnosis_details')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diagnosis_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_diagnosis_detail_diagnosis_details1');
		});
	}

}
