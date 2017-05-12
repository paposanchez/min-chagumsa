<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('board_id');
			$table->bigInteger('user_id')->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('is_secret')->nullable();
			$table->integer('is_answered')->nullable();
			$table->integer('is_shown')->nullable();
			$table->bigInteger('thumbnail')->nullable();
			$table->string('subject', 250);
			$table->text('content', 65535);
			$table->string('name', 100)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('password', 100)->nullable();
			$table->integer('hit')->default(0);
			$table->string('ip', 20);
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
		Schema::drop('posts');
	}

}
