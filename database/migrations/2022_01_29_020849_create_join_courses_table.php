<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('proj_comp_student_id');
            $table->integer('course_id');
            $table->date('join_date');
            $table->date('end_date');
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
        Schema::dropIfExists('join_courses');
    }
}
