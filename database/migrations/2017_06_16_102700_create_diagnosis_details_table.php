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
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('orders_id')->unsigned();
			$table->integer('name_cd')->comment('그룹항목명');
			$table->integer('sound_file')->nullable()->comment('점검의견 음성파일 여부, 파일명은 패턴으로');
			$table->text('extraction', 65535)->nullable()->comment('점검의견 추출텍스트');
			$table->timestamps();
			$table->unique(['orders_id','name_cd'], 'uk');
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
