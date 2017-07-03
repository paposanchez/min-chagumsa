<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailConfirmationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_confirmations', function(Blueprint $table)
		{
			$table->string('email', 150)->index('password_resets_email_index');
			$table->string('token', 100)->index('password_resets_token_index');
			$table->timestamps();
			$table->primary(['email','token']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_confirmations');
	}

}
