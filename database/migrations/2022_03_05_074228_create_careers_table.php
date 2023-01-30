<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name_of_course');
            $table->string('other_name_of_course')->nullable();
            $table->longText('course_description');
            $table->longText('syllabus');
            $table->longText('course_keyword');
            $table->boolean('have_pre_requisite');
            $table->longText('tell_pre_requisite')->nullable();
            $table->text('opportunity_after_course');
            $table->string('have_mock_test_interview');
            $table->boolean('conduct_lecture');
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
        Schema::dropIfExists('careers');
    }
}
