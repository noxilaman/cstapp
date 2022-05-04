<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update30042022 extends Migration
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
                    $table->string('addr2',100)->nullable();
                    $table->string('tumbon',100)->nullable();
                    $table->string('city',100)->nullable();
                    $table->string('additional',100)->nullable();
                }
            );
            Schema::table(
                'students',
                    function (Blueprint $table) {
                        $table->string('fristtime',20)->nullable();
                        $table->date('birth')->nullable();
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
        if (Schema::hasColumn('companies', 'addr2')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('addr2');
            });
        }
        if (Schema::hasColumn('companies', 'tumbon')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('tumbon');
            });
        }
        if (Schema::hasColumn('companies', 'city')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('city');
            });
        }
        if (Schema::hasColumn('companies', 'additional')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('additional');
            });
        }
        if (Schema::hasColumn('students', 'fristtime')) {
            Schema::table('students', function (Blueprint $table) {
                $table->dropColumn('fristtime');
            });
        }
        if (Schema::hasColumn('students', 'birth')) {
            Schema::table('students', function (Blueprint $table) {
                $table->dropColumn('birth');
            });
        }
    }
}
