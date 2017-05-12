<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserSequenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_sequence', function(Blueprint $table)
		{
			$table->integer('user_seq')->unsigned()->comment('사업자등록번호');
			$table->bigInteger('users_id')->unsigned()->index('fk_user_sequence_users1_idx');
			$table->primary(['user_seq','users_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_sequence');
	}

}
