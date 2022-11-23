<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update20221123002 extends Migration
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
                $table->string('view_clip', 20)->nullable();
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
        if (Schema::hasColumn('join_courses', 'view_clip')) {
            Schema::table('join_courses', function (Blueprint $table) {
                $table->dropColumn('view_clip');
            });
        }
    }
}
