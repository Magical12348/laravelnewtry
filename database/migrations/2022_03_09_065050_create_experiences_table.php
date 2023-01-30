<?php

use App\Models\Experience;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_verified')->default(Experience::UNVERIFIED);
            $table->foreignId('user_id')->constrained();
            $table->string('qualification')->nullable();
            $table->boolean('is_experienced')->nullable();
            $table->string('experienced_in_online')->nullable();
            $table->string('experienced_in_offline')->nullable();
            $table->string('certification')->nullable();
            $table->string('preferred_mode')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('teaching_experience')->nullable();
            $table->longText('no_case_study')->nullable();
            $table->longText('research_project')->nullable();
            $table->longText('other_experience')->nullable();
            $table->longText('companies_linked_to_you')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('provide_document_aadhar')->nullable();
            $table->string('provide_document_photo')->nullable();
            $table->string('provide_document_pan')->nullable();
            $table->string('provide_document_bank')->nullable();
            $table->string('provide_document_marksheet')->nullable();
            $table->string('provide_document_experience_letter')->nullable();
            $table->string('provide_document_certificate')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
