<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update20221123 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'courses',
            function (Blueprint $table) {
                $table->string('link_clip', 200)->nullable();
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
        if (Schema::hasColumn('courses', 'link_clip')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('link_clip');
            });
        }
    }
}
