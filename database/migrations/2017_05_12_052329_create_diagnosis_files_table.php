<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_files', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned()->primary();
			$table->bigInteger('diagnosis_details_id')->unsigned()->index('fk_diagnosis_files_diagnosis_details1_idx');
			$table->string('original', 200)->comment('원본파일명');
			$table->string('source', 200)->nullable()->comment('업로드파일명');
			$table->string('path', 200)->nullable();
			$table->timestamps();
			$table->string('size', 45)->nullable();
			$table->string('mime', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diagnosis_files');
	}

}
