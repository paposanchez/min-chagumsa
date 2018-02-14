<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosesFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_files', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('original', 200)->comment('원본파일명');
			$table->string('source', 200)->nullable()->comment('업로드파일명');
			$table->string('path', 200)->nullable();
			$table->string('mime', 45)->nullable();
			$table->string('size', 45)->nullable();
			$table->timestamps();
			$table->bigInteger('diagnosis_detail_items_id')->unsigned()->index('fk_diagnosis_files_diagnosis_detail_items1_idx');
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
