<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserExtrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_extras', function(Blueprint $table)
		{
			$table->string('registration_number', 20)->nullable()->comment('사업자등록번호');
			$table->string('engineer_number', 20)->nullable()->comment('기술사번호');
			$table->string('phone', 15)->nullable();
			$table->string('fax', 15)->nullable();
			$table->string('zipcode', 10)->nullable();
			$table->string('address', 100)->nullable();
			$table->string('address_extra', 100)->nullable();
			$table->bigInteger('users_id')->unsigned()->index('fk_user_extras_users1_idx');
			$table->timestamps();
			$table->string('user_extrascol', 45)->nullable();
			$table->bigInteger('aliance_id')->nullable()->comment('대리점 회원인경우 서비스 네트워크 아이디 등록필요');
			$table->bigInteger('garage_id')->nullable()->comment('엔지니어 회원인 경우 대리점 아이디 필요');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_extras');
	}

}
