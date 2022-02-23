<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update19022022002 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'chioces',
            function (Blueprint $table) {
                $table->string('image')->nullable();
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
        if (Schema::hasColumn('chioces', 'image')) {
            Schema::table('chioces', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
}
