<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_dates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('floor_flag')->nullable();
            $table->integer('bar_flag')->nullable();
            $table->integer('vaulting_flag')->nullable();
            $table->integer('trampoline_flag')->nullable();
            $table->integer('other_flag')->nullable();
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
        Schema::dropIfExists('lesson_dates');
    }
}
