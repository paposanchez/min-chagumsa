<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 250);
			$table->boolean('use_secret')->default(0);
			$table->boolean('use_captcha')->default(0);
			$table->boolean('use_comment')->default(0);
			$table->boolean('use_opinion')->default(0);
			$table->boolean('use_tag')->default(0);
			$table->boolean('use_category')->default(0);
			$table->boolean('use_upload')->default(0);
			$table->boolean('use_thumbnail')->default(0);
			$table->integer('upload_max_filesize')->default(0);
			$table->boolean('upload_max_limit')->default(0);
			$table->integer('status_cd');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('boards');
	}

}
