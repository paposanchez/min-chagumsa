<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggingTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagging_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tag_group_id')->unsigned()->nullable()->index('tagging_tags_tag_group_id_foreign');
			$table->string('slug', 191)->index();
			$table->string('name', 191);
			$table->boolean('suggest')->default(0);
			$table->integer('count')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagging_tags');
	}

}
