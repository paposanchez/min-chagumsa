<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosises', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('orders_id')->unsigned()->index('fk_diagnosises_orders1_idx');
			$table->integer('name_cd')->comment('그룹항목명');
			$table->integer('sound_file')->nullable()->comment('점검의견 음성파일 여부');
			$table->text('extraction', 65535)->nullable()->comment('점검의견');
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
		Schema::drop('diagnosises');
	}

}
