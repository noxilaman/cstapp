<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinCourseLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_course_lessons', function (Blueprint $table) {
            $table->id();
            $table->integer('join_course_id');
            $table->integer('lesson_id');
            $table->date('join_date');
            $table->date('end_date')->nullable();
            $table->string('progress',50)->default('Join');  
            $table->string('status',50)->default('Active');
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
        Schema::dropIfExists('join_course_lessons');
    }
}
