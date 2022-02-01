<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjCompStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proj_comp_students', function (Blueprint $table) {
            $table->id();
            $table->integer('project_company_id');
            $table->integer('student_id');
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
        Schema::dropIfExists('proj_comp_students');
    }
}
