<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->char('id', 17)->primary()->comment('VIN Number, 기술사 입력전까지 차량번호');
			$table->integer('kind_cd');
			$table->integer('detail_id')->unsigned()->index('fk_cars_details1_idx')->comment('모델');
			$table->string('imported_vin_number', 30)->nullable()->comment('수입차 VIN 번호');
			$table->integer('fueltype_cd')->nullable()->comment('연료타입');
			$table->integer('engine_cd')->nullable()->comment('엔진타입');
			$table->integer('transmission_cd')->nullable()->comment('변속기');
			$table->integer('drivetype_cd')->nullable();
			$table->integer('interior_color_cd')->nullable()->comment('내장색');
			$table->integer('exterior_color_cd')->nullable()->comment('외장색');
			$table->date('year')->nullable()->comment('출고연도');
			$table->date('registration_date')->nullable()->comment('최초등록일');
			$table->integer('type_cd')->nullable()->comment('용도');
			$table->integer('usage_cd')->nullable();
			$table->boolean('passenger')->nullable()->comment('승차정원');
			$table->string('output', 45)->nullable()->comment('정격출력');
			$table->decimal('fuel_consumption', 4, 1)->nullable()->comment('연비');
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
		Schema::drop('cars');
	}

}
