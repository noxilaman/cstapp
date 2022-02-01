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
            $table->string('idcard',50);
            $table->string('mobile',50);
            $table->string('fname',100)->nullable();
            $table->string('lname',100)->nullable();
            $table->string('fname_en',100)->nullable();
            $table->string('lname_en',100)->nullable();
            $table->string('uname',50)->unique();
            $table->string('upass',50);
            $table->string('status',50)->default('Active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
