<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id', true)->increments()->unsigned();
            $table->string('name', 150);
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->rememberToken();            
            $table->string('mobile')->nullable();
            $table->integer('avatar')->nullable();
            $table->integer('status_cd');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('users');
    }

}
