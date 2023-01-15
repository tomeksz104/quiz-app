<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_questions', function (Blueprint $table) {
            $table->id();
            $table->boolean('correct')->nullable()->default(0);
            $table->foreignId('result_quiz_id')->nullable();
            $table->foreignId('question_id')->unsigned()->nullable();
            $table->foreignId('question_answer_id')->nullable()->index();
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
        Schema::dropIfExists('results_questions');
    }
}
