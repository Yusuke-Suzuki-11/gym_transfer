<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaultingHoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaulting_hourses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('first_description')->nullable();
            $table->text('second_description')->nullable();
            $table->text('third_description')->nullable();
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
        Schema::dropIfExists('vaulting_hourses');
    }
}
