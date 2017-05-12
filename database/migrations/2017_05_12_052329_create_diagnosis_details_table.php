<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_details', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->bigInteger('diagnosises_id')->unsigned()->index('fk_diagnosis_details_diagnosises1_idx');
			$table->integer('name_cd')->comment('항목명 코드값');
			$table->integer('value_cd')->nullable()->comment('선택 코드값, 항목이 단순 파일추가인 경우 없음으로 NULL');
			$table->string('option_cd', 45)->nullable();
			$table->string('option_value_cd', 45)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diagnosis_details');
	}

}
