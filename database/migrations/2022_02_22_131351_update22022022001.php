<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update22022022001 extends Migration
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
                $table->integer('project_id')->nullable();
                $table->integer('company_id')->nullable();
                $table->integer('student_id')->nullable();
            }
        );

        Schema::table(
        'proj_comp_students',
            function (Blueprint $table) {
                $table->integer('project_id')->nullable();
                $table->integer('company_id')->nullable();
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
        if (Schema::hasColumn('join_courses', 'project_id')) {
            Schema::table('join_courses', function (Blueprint $table) {
                $table->dropColumn('project_id');
            });
        }
        if (Schema::hasColumn('join_courses', 'company_id')) {
            Schema::table('join_courses', function (Blueprint $table) {
                $table->dropColumn('company_id');
            });
        }
        if (Schema::hasColumn('join_courses', 'student_id')) {
            Schema::table('join_courses', function (Blueprint $table) {
                $table->dropColumn('student_id');
            });
        }
        if (Schema::hasColumn('proj_comp_students', 'project_id')) {
            Schema::table('proj_comp_students', function (Blueprint $table) {
                $table->dropColumn('project_id');
            });
        }
        if (Schema::hasColumn('proj_comp_students', 'company_id')) {
            Schema::table('proj_comp_students', function (Blueprint $table) {
                $table->dropColumn('company_id');
            });
        }
    }
}
