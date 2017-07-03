<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisDetailItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_detail_items', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('diagnosis_detail_id')->unsigned()->index('fk_diagnosis_detail_items_diagnosis_detail1_idx');
			$table->integer('name_cd')->comment('진단항목 코드값, 항목이름조회');
			$table->boolean('use_image')->default(0)->comment('파일업로드 노출여부');
			$table->boolean('use_voice')->default(0);
			$table->integer('options_cd')->nullable()->comment('선택할 코드목록 코드');
			$table->integer('selected')->nullable()->comment('선택된 코드값');
			$table->string('required_image_options', 50)->nullable()->comment('options_cd에서 이미지업로드가 필요한 항목의 코드
콤마로 구분된 코드');
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
		Schema::drop('diagnosis_detail_items');
	}

}
