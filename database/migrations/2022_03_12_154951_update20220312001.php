<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update20220312001 extends Migration
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
                $table->string('cert_img_th')->nullable();
                $table->string('cert_img_en')->nullable();
                $table->integer('name_th_x')->nullable();
                $table->integer('name_th_y')->nullable();
                $table->integer('name_en_x')->nullable();
                $table->integer('name_en_y')->nullable();
                $table->integer('logo_th_x')->nullable();
                $table->integer('logo_th_y')->nullable();
                $table->integer('logo_en_x')->nullable();
                $table->integer('logo_en_y')->nullable();
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
        if (Schema::hasColumn('courses', 'cert_img_th')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('cert_img_th');
            });
        }
        if (Schema::hasColumn('courses', 'cert_img_en')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('cert_img_en');
            });
        }
        if (Schema::hasColumn('courses', 'name_th_x')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('name_th_x');
            });
        }
        if (Schema::hasColumn('courses', 'name_th_y')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('name_th_y');
            });
        }
        if (Schema::hasColumn('courses', 'name_en_x')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('name_en_x');
            });
        }
        if (Schema::hasColumn('courses', 'name_en_y')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('name_en_y');
            });
        }

        if (Schema::hasColumn('courses', 'logo_th_x')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('logo_th_x');
            });
        }
        if (Schema::hasColumn('courses', 'logo_th_y')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('logo_th_y');
            });
        }
        if (Schema::hasColumn('courses', 'logo_en_x')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('logo_en_x');
            });
        }
        if (Schema::hasColumn('courses', 'logo_en_y')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->dropColumn('logo_en_y');
            });
        }
    }
}
