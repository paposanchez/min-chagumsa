<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisDetailCopy1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_detail_copy1', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('parent_id')->nullable();
			$table->bigInteger('diagnosis_details_id')->unsigned()->nullable()->index('fk_diagnosis_detail_diagnosis_details1_idx');
			$table->integer('name_cd')->comment('진단항목 코드값, 항목이름조회');
			$table->integer('options_cd')->nullable()->comment('선택할 상태코드');
			$table->integer('selected_cd')->nullable()->comment('선택된 상태코드');
			$table->string('description', 200)->nullable()->comment('placeholder 혹은 설명');
			$table->boolean('use_picture_upload')->default(0)->comment('이미지 업로드 사용여부');
			$table->boolean('use_picture_required')->default(0)->comment('필수 이미지 업로드 갯수');
			$table->boolean('use_sound_upload')->default(0)->comment('음성파일 업로드 여부');
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
		Schema::drop('diagnosis_detail_copy1');
	}

}
