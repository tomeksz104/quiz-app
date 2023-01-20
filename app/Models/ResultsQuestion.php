<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class ResultsQuestion extends Model
{
    use HasFactory;

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function questions_answers(): BelongsTo
    {
        return $this->belongsTo(Answer::class, 'question_answer_id');
    }

    public function scopeGetPercentageResultForAnswers(Builder $query, $questions_ids)
    {
        $count_total_answers_for_question_id = $this->whereIn('question_id', $questions_ids)
            ->select('question_id', DB::raw('count(*) as total_question_id'))
            ->groupBy('question_id')
            ->get()->toArray();

        foreach($count_total_answers_for_question_id as $question)
        {
            $total_questions[$question['question_id']] = $question['total_question_id'];
        }

        $count_total_answers =  $this->whereIn('question_id', $questions_ids)
            ->select('question_answer_id',  DB::raw('count(*) as total_answer_id'))
            ->addSelect('question_id')
            ->groupBy('question_answer_id')
            ->get()->toArray();

        foreach($count_total_answers as $answer)
        {
            if(array_key_exists($answer['question_id'], $total_questions))
            {
                $answer_result_percentage = $answer['total_answer_id'] / $total_questions[$answer['question_id']] * 100;
                $answers_result_percentage[$answer['question_answer_id']] = $answer_result_percentage;
            }
        }

        return $answers_result_percentage;
    }

}
