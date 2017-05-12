<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiagnosisDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diagnosis_details', function(Blueprint $table)
		{
			$table->foreign('diagnosises_id', 'fk_diagnosis_details_diagnosises1')->references('id')->on('diagnosises')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diagnosis_details', function(Blueprint $table)
		{
			$table->dropForeign('fk_diagnosis_details_diagnosises1');
		});
	}

}
