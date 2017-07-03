<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certificates', function(Blueprint $table)
		{
			$table->bigInteger('orders_id')->unsigned()->primary();
			$table->integer('price')->default(0)->comment('차량평가액');
			$table->string('grade', 5)->nullable()->comment('평가등급');
			$table->boolean('expire_period')->default(30)->comment('인증보장기간, 일단위');
			$table->text('opinion', 65535)->nullable()->comment('종합의견');
			$table->boolean('history_insurance')->default(0)->comment('보험사고이력 갯수');
			$table->boolean('history_insurance_file')->default(0)->comment('사고이력 이미지 업로드여부');
			$table->boolean('history_owner')->default(0)->comment('수유자 이력수');
			$table->boolean('history_maintance')->default(0)->comment('정비이력수');
			$table->string('history_purpose', 250)->nullable()->comment('용도변경이력');
			$table->string('history_garage', 250)->nullable()->comment('차고지 이력');
			$table->integer('valuation')->nullable()->comment('평가액');
			$table->integer('basic_registraion')->nullable()->comment('등록일보정');
			$table->integer('basic_registraion_depreciation')->nullable()->comment('등록일보정 감가액');
			$table->integer('basic_mounting_cd')->unsigned()->nullable()->comment('장착품(추가옵션) 평가');
			$table->integer('basic_etc')->nullable()->comment('색상 등 기타');
			$table->integer('usage_mileage_cd')->nullable()->comment('주행거리평가(표준/초과/미달)');
			$table->integer('usage_mileage_depreciation')->nullable()->comment('주행거리평가 감가액');
			$table->integer('usage_history_cd')->nullable()->comment('사고/수리이력평가');
			$table->integer('usage_history_depreciation')->nullable()->comment('사고/수리이력평가 감가액');
			$table->integer('performance_exterior_cd')->nullable()->comment('외관');
			$table->integer('performance_interior_cd')->nullable()->comment('실내/내장');
			$table->integer('performance_device_cd')->nullable()->comment('주요장치, 성능상태');
			$table->integer('performance_tire_cd')->nullable()->comment('횔,타이어 상태');
			$table->integer('performance_depreciation')->nullable()->comment('차량성능상태 감가금액');
			$table->integer('special_flooded_cd')->nullable()->comment('침수차량');
			$table->integer('special_fire_cd')->nullable()->comment('화재차량');
			$table->integer('special_fulllose_cd')->nullable()->comment('전손차량');
			$table->integer('special_remodel_cd')->nullable()->comment('불법개조');
			$table->integer('special_etc_cd')->nullable()->comment('기타요인');
			$table->timestamps();
			$table->integer('special_depreciation')->nullable()->comment('특별요인 감가금액');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('certificates');
	}

}
