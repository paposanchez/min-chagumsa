<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('original', 250);
			$table->string('source', 50);
			$table->string('path', 250);
			$table->integer('size')->unsigned()->default(0);
			$table->string('extension', 20)->nullable();
			$table->string('mime', 50)->nullable();
			$table->string('hash', 32)->nullable();
			$table->integer('download')->unsigned()->default(0);
			$table->string('group', 10)->nullable();
			$table->bigInteger('group_id')->nullable();
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
		Schema::drop('files');
	}

}
