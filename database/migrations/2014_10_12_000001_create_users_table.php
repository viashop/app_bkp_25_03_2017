<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('email')->nullable()->unique();
			$table->string('password')->nullable();
			$table->boolean('active')->default(0);
			$table->string('verification_token')->nullable();
			$table->boolean('registered_via_oauth')->nullable()->default(0);
			$table->string('remember_token')->nullable();
			$table->boolean('admin')->default(0);
			$table->boolean('user')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});

		\DB::statement('ALTER TABLE users ADD FULLTEXT full_name(name)');
        \DB::statement('ALTER TABLE users ADD FULLTEXT full_name_email(name, email)');

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
