<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->char('datekey', 6)->comment('주문날짜번호ㅡ car_number과 uniq를 이룬다');
			$table->char('car_number', 7)->comment('차량번호');
			$table->char('car_id', 17)->index('fk_orders_cars_idx')->comment('자동차 VIN NUMBER');
			$table->bigInteger('garage_id')->unsigned()->comment('입고대리점 user_id');
			$table->integer('item_id')->unsigned()->index('fk_orders_items_idx')->comment('상품 seq');
			$table->bigInteger('purchase_id')->unsigned()->index('fk_orders_purchase_idx')->comment('결제 seq');
			$table->bigInteger('engineer_id')->nullable()->comment('정비사 회원번호');
			$table->bigInteger('technist_id')->nullable()->comment('기술사번호');
			$table->bigInteger('orderer_id')->comment('주문자 회원번호');
			$table->string('orderer_name', 100)->comment('주문자명');
			$table->string('orderer_mobile', 15)->comment('주문자 휴대전화번호');
			$table->integer('registration_file_cd')->unsigned()->comment('차량등록증 업로드여부, 공통파일명으로 저장');
			$table->integer('mileage')->unsigned()->nullable()->comment('주행거리');
			$table->integer('open_cd')->unsigned()->comment('인증서 공개여부');
			$table->bigInteger('verification_id')->nullable()->comment('주문자 실명인증 seq');
			$table->integer('status_cd')->default(10)->comment('주문상태 코드');
			$table->timestamps();
			$table->unique(['datekey','car_number'], 'uk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
