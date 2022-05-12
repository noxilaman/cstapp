<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update20220512 extends Migration
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
                $table->string('website', 150)->nullable();
                $table->string('contact_sex', 50)->nullable();
                $table->string('contact_position', 150)->nullable();
                $table->string('contact_tel', 150)->nullable();
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
        if (Schema::hasColumn('companies', 'website')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('website');
            });
        }
        if (Schema::hasColumn('companies', 'contact_sex')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('contact_sex');
            });
        }
        if (Schema::hasColumn('companies', 'contact_position')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('contact_position');
            });
        }
        if (Schema::hasColumn('companies', 'contact_tel')) {
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('contact_tel');
            });
        }
    }
}
