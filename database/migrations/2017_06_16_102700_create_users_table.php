<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name', 150);
			$table->string('email', 150)->unique();
			$table->string('password', 80);
			$table->string('remember_token', 100)->nullable();
			$table->string('mobile', 20)->nullable();
			$table->integer('avatar')->nullable()->comment('files.id');
			$table->integer('status_cd')->comment('codes.user_status');
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
		Schema::drop('users');
	}

}
