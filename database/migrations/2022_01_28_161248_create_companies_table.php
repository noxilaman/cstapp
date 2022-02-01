<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('company_type_id');
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->text('desc')->nullable();
            $table->text('addr')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
