<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggingTaggedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagging_tagged', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('taggable_id')->unsigned()->index();
			$table->string('taggable_type', 191)->index();
			$table->string('tag_name', 191);
			$table->string('tag_slug', 191)->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagging_tagged');
	}

}
