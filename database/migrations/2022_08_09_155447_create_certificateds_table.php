<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificateds', function (Blueprint $table) {
            $table->id();
            $table->integer('join_course_id')->nullable();
            $table->integer('compnay_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('token', 100)->nullable();
            $table->date('pass_date')->nullable();
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
        Schema::dropIfExists('certificateds');
    }
}
