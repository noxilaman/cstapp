<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiocesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chioces', function (Blueprint $table) {
            $table->id();
            $table->integer('quiz_id');
            $table->string('name');
            $table->text('desc')->nullable();
            $table->integer('result')->nullable();
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
        Schema::dropIfExists('chioces');
    }
}
