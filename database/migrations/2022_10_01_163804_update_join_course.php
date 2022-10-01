<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJoinCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'join_courses',
            function (Blueprint $table) {
                $table->string('hashkey', 100)->nullable();
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
        if (Schema::hasColumn('join_courses', 'hashkey')) {
            Schema::table('join_courses', function (Blueprint $table) {
                $table->dropColumn('hashkey');
            });
        }
    }
}
