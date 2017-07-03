<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_detail', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->bigInteger('diagnosis_details_id')->unsigned()->index('fk_diagnosis_detail_diagnosis_details1_idx');
			$table->integer('name_cd')->comment('진단항목 코드값, 항목이름조회');
			$table->string('description', 200)->nullable();
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
		Schema::drop('diagnosis_detail');
	}

}
