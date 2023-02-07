<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('week');
            $table->tinyInteger('day');
            $table->tinyInteger('ordinal');
            $table->unsignedBigInteger('group');
            $table->foreign('group')->references('id')->on('groups');
            $table->unsignedBigInteger('subject');
            $table->foreign('subject')->references('id')->on('subjects');
            $table->unsignedBigInteger('classroom');
            $table->foreign('classroom')->references('id')->on('classrooms');
            $table->unsignedBigInteger('teacher');
            $table->foreign('teacher')->references('id')->on('teachers');
            $table->unsignedBigInteger('opt_classroom')->nullable();
            $table->foreign('opt_classroom')->references('id')->on('classrooms');
            $table->unsignedBigInteger('opt_teacher')->nullable();
            $table->foreign('opt_teacher')->references('id')->on('teachers');
            $table->unique([
                'week',
                'day',
                'ordinal',
                'group',
                'subject'
            ], 'UniqueLesson');
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
        Schema::dropIfExists('timetable');
    }
}
