<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationVerificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('application_verification', function(Blueprint $table)
		{
			$table->bigInteger('user_id')->unsigned()->primary()->comment('사용자 seq');
			$table->text('link', 65535)->nullable()->comment('다운로드 링크');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('application_verification');
	}

}
