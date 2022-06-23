<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update20220624 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'companies',
            function (Blueprint $table) {
                $table->string('com_email', 100)->nullable();
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
        if (Schema::hasColumn('companies', 'com_email')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('com_email');
            });
        }
    }
}
