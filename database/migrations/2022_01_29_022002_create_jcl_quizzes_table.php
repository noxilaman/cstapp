<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJclQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jcl_quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('join_course_lesson_id');
            $table->integer('quiz_id');
            $table->date('join_date');
            $table->date('end_date')->nullable();
            $table->integer('time_no');
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
        Schema::dropIfExists('jcl_quizzes');
    }
}
