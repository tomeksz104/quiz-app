<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('result', 9)->nullable();
            $table->string('ip_address', 45)->index();
            /*$table->foreignId('user_id')->nullable()->index();*/
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('result_message_id')->nullable()->constrained('result_messages');
            $table->foreignId('quiz_id')->index();
            $table->string('time_spent', 5); //in seconds max 27 hours to solve quiz
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
        Schema::dropIfExists('results_quizzes');
    }
}
