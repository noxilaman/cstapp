<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update22022028001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
        'quizzes',
            function (Blueprint $table) {
                $table->integer('section_id')->nullable();
            }
        );

        Schema::table(
        'jcl_quizzes',
            function (Blueprint $table) {
                $table->integer('jcl_section_id')->nullable();
            }
        );

        if (Schema::hasColumn('quizzes', 'lesson_id')) {
            Schema::table('quizzes', function (Blueprint $table) {
                $table->dropColumn('lesson_id');
            });
        }

        if (Schema::hasColumn('jcl_quizzes', 'join_course_lesson_id')) {
            Schema::table('jcl_quizzes', function (Blueprint $table) {
                $table->dropColumn('join_course_lesson_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('quizzes', 'section_id')) {
            Schema::table('quizzes', function (Blueprint $table) {
                $table->dropColumn('section_id');
            });
        }

        if (Schema::hasColumn('jcl_quizzes', 'jcl_section_id')) {
            Schema::table('jcl_quizzes', function (Blueprint $table) {
                $table->dropColumn('jcl_section_id');
            });
        }

        Schema::table(
        'quizzes',
            function (Blueprint $table) {
                $table->integer('lesson_id')->nullable();
            }
        );

        Schema::table(
        'jcl_quizzes',
            function (Blueprint $table) {
                $table->integer('join_course_lesson_id')->nullable();
            }
        );
    }
}
