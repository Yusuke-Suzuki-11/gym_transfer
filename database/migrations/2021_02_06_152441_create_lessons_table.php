<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->date('lesson_date');
            $table->text('memo')->nullable();
            $table->integer('attendance')->default('1');
            //レッスンが振り返られた時or期間を過ぎた時
            $table->integer('valid')->default('1');
            $table->integer('change_lesson_id')->nullable();
            $table->integer('course_id');
            $table->integer('student_id');
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
        Schema::dropIfExists('lessons');
    }
}
