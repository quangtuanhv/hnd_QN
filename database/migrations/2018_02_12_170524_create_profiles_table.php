<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('profiles', function (Blueprint $table) {
				$table->increments('id');
				$table->string('fullname');
				$table->string('email');
				$table->string('phone');
				$table->string('avatar');
				$table->string('address');
				$table->string('note');
				$table->boolean('gender');
				$table->integer('user_id');
				$table->integer('chucVu_id');
				$table->integer('role_id');
				$table->integer('donVi_id');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('profiles');
	}
}
