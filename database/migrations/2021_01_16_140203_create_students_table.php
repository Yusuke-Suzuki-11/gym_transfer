<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function (Blueprint $table) {
			$table->id();
			$table->string('full_name');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->string('member_num');
			$table->date('birthday');
			$table->string('gender');
			$table->integer('stress_point');
			$table->text('phone');
			$table->integer('transfer_enabled')->default(1);
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
		Schema::dropIfExists('students');
	}
}
