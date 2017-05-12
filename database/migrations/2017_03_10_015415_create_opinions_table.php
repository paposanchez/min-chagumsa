<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpinionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opinions', function(Blueprint $table)
		{
			$table->bigInteger('post_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->integer('opinion')->nullable();
			$table->string('ip', 45)->nullable();
			 $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
			$table->unique(['post_id','user_id'], 'uid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('opinions');
	}

}
