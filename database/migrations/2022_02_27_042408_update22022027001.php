<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update22022027001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
        'users',
            function (Blueprint $table) {
                $table->string('status', 50)->default('Active');
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
        if (Schema::hasColumn('users', 'status')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
}
