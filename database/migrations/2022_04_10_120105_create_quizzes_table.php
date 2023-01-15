<?php

use App\Enums\QuizStatus;
use App\Enums\QuizType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_type')->default(1)->constrained('quiz_types');
            $table->string('title');
            $table->string('slug')->index();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('description');
            $table->bigInteger('time_for_answer')->default(0)->nullable();
            $table->enum('status', QuizStatus::TYPES)->default(QuizStatus::PENDING);
            $table->boolean('public')->nullable()->default(0);
            $table->bigInteger('views')->unsigned()->default(0)->index();
            $table->bigInteger('votes')->unsigned()->default(0)->index();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('quizzes');
        Schema::enableForeignKeyConstraints();
    }
}
