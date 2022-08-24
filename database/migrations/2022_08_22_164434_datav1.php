<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('img');
            $table->string('email');
            $table->timestamps();

        });
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('semester');

            $table->string('description');
            $table->timestamps();

        });
         Schema::create('class_students', function (Blueprint $table) {
            $table->id();
            $table->integer('classid');

            $table->integer('studentid');
            $table->timestamps();

        });
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('img');
            $table->integer('duration');
            $table->timestamps();

        });
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('maxpoint');
            $table->string('Description');
            $table->string('img');
            $table->timestamps();

        });
        Schema::create('class_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('classid');

            $table->integer('courseid');
            $table->timestamps();

        });
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('studentid');

            $table->integer('courseid');
            $table->timestamps();

        });
        Schema::create('course_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('examid');

            $table->integer('courseid');
            $table->timestamps();

        });
        Schema::create('student_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('studentid');

            $table->integer('examid');

            $table->timestamps();

        });
        Schema::create('student_exam_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('studentid');

            $table->integer('examid');
            $table->integer('test_time');
            $table->integer('point');
            $table->timestamps();

        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('name');
            $table->string('chapter');
            $table->string('description');
            $table->string('file');
            $table->string('video_url')->nullable();
            $table->integer('final_examid');
            $table->timestamps();

    });
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('answer1');
        $table->string('answer2');
        $table->string('answer3');
        $table->string('answer4');
        $table->string('correct_answer');
        $table->string('type');
        $table->string('point');
        $table->timestamps();

});
Schema::create('question_exams', function (Blueprint $table) {
    $table->id();
    $table->integer('questionid');
    $table->integer('examid');
    $table->timestamps();

});
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->integer('roleid');
    $table->string('username');
    $table->string('password');
    $table->integer('name');
    $table->timestamps();

});
Schema::create('roles', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('permission');

    $table->timestamps();

});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('classes');
        Schema::dropIfExists('class_student');
        Schema::dropIfExists('course');
        Schema::dropIfExists('exam');
        Schema::dropIfExists('class_course');
        Schema::dropIfExists('student_course');



        Schema::dropIfExists('course_exam');
        Schema::dropIfExists('student_exam');
        Schema::dropIfExists('student_exam_history');
        Schema::dropIfExists('lesson');
        Schema::dropIfExists('question');
        Schema::dropIfExists('question_exam');
        Schema::dropIfExists('user');
        Schema::dropIfExists('role');
    }
};
