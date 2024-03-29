<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('survey_responses')){
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('survey_compilation_id')->unsigned();
            $table->foreign('survey_compilation_id')->references('id')->on('survey_compilations');
            $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->bigInteger('answer_id')->unsigned();
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('survey_responses', function (Blueprint $table) {
        $table->dropForeign(['survey_compilation_id']);
    });

    Schema::dropIfExists('survey_responses');
    // Ora dovresti essere in grado di eliminare 'survey_compilations'
    Schema::dropIfExists('survey_compilations');
}

};
