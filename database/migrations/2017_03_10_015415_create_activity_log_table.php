<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_log', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('log_name')->nullable();
			$table->string('description');
			$table->integer('subject_id')->nullable();
			$table->string('subject_type')->nullable();
			$table->integer('causer_id')->nullable();
			$table->string('causer_type')->nullable();
			$table->text('properties', 65535)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('activity_log');
	}

}
