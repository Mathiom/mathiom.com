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
		Schema::create('users', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('email', 48);
			$table->string('password', 60);
			$table->smallInteger('confirmation')->default(0);
			$table->timestamp('confirmation_timestamp');
			$table->timestamps();
		});
		DB::statement("ALTER TABLE ".DB::getTablePrefix()."users CHANGE confirmation_timestamp confirmation_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL");
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
