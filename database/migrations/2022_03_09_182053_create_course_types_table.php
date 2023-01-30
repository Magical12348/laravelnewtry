<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained();
            $table->string('course_type');
            $table->string('module_level');
            $table->string('days_of_modules');
            $table->string('timing_from');
            $table->string('timing_to');
            $table->boolean('note_available');
            $table->string('is_job_guaranteed');
            $table->boolean('provide_certificate');
            $table->string('course_fees');
            $table->json('demo_image')->nullable();
            $table->string('demo_video')->nullable();
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
        Schema::dropIfExists('course_types');
    }
}
