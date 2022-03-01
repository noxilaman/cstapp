<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update22022028002 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
        'sections',
            function (Blueprint $table) {
                $table->integer('limit_quiz')->nullable();
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
        if (Schema::hasColumn('sections', 'limit_quiz')) {
            Schema::table('sections', function (Blueprint $table) {
                $table->dropColumn('limit_quiz');
            });
        }
    }
}
