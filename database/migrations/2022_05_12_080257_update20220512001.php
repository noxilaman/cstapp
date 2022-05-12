<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update20220512001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'students',
            function (Blueprint $table) {
                $table->string('sex', 50)->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('students', 'sex')) {
            Schema::table('students', function (Blueprint $table) {
                $table->dropColumn('sex');
            });
        }
    }
}
