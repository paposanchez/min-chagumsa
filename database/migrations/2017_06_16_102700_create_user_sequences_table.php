<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserSequencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_sequences', function(Blueprint $table)
		{
			$table->bigInteger('users_id')->unsigned()->index('fk_user_sequence_users1_idx');
			$table->integer('seq')->unsigned()->comment('회원별 seq, garage_seq+seq는 uk');
			$table->integer('garage_seq')->unsigned()->comment('대리점 user_seq');
			$table->dateTime('logined_at')->nullable();
			$table->index(['garage_seq','seq'], 'uk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_sequences');
	}

}
