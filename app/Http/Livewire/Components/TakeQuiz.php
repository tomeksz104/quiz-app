<?php

namespace App\Http\Livewire\Components;

use App\Models\Answers;
use App\Models\Quiz;
use App\Models\ResultsQuestion;
use App\Models\ResultsQuiz;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function redirect;
use function request;
use function view;

class TakeQuiz extends Component
{
    public $quiz, $start;

    public $numberQuestion = 0;

    public $question_answers = [];

    public function render()
    {
        return view('livewire.components.take-quiz', [
            'totalQuestions' => count($this->quiz->questions),
            'question' => $this->quiz->questions[$this->numberQuestion],
            'answers' => $this->quiz->questions[$this->numberQuestion]->answers,
        ])
            ->extends('layout/main')
            ->section('content');
    }

    public function mount($id)
    {
        $this->quiz = Quiz::find($id);
        $this->start = Carbon::now();

        $this->time_for_answer = $this->quiz->time_for_answer;
    }

    public function nextQuestion()
    {
        if ($this->numberQuestion + 1 == count($this->quiz->questions)) {
            $this->storeResultOfQuiz();
        } else {
            $this->numberQuestion++;
        }
    }

    public function previousQuestion()
    {
        if ($this->numberQuestion != 0) {
            $this->numberQuestion--;
        }
    }

    public function storeResultOfQuiz()
    {
        $result = 0;

        $questions_ids = $this->quiz->questions->pluck('id')->toArray();
        $correct_answers = Answers::whereIn('question_id', $questions_ids)->where('correct', 1)->pluck('id')->toArray();

        $resultQuiz = new ResultsQuiz();
        $resultQuiz->ip_address = request()->ip();
        $resultQuiz->user_id = Auth::id() ?? null;
        $resultQuiz->quiz_id = $this->quiz->id;
        $resultQuiz->time_spent = Carbon::parse($this->start)->diffInSeconds(Carbon::now());
        $resultQuiz->save();

        foreach($this->question_answers as $question_id => $answer_id)
        {
            $resultQuestion = new ResultsQuestion();
            $resultQuestion->result_quiz_id = $resultQuiz->id;
            $resultQuestion->question_id = $question_id;
            $resultQuestion->question_answer_id = $answer_id;
            if(in_array($answer_id, $correct_answers)) {
                $result++;
                $resultQuestion->correct = true;
            } else {
                $resultQuestion->correct = false;
            }
            $resultQuestion->save();

            if($this->quiz->quiz_type === 4)
            {
                $answers_ids[] = (int) $answer_id;
            }
        }

        if($this->quiz->quiz_type === 4)
        {

            $question_answers = Answers::whereIn('id', $answers_ids)
                ->get('result_message_id')
                ->toArray();

            $count_most_result_apperances = array_count_values(array_column($question_answers, 'result_message_id'));

            $result_message_id = array_keys($count_most_result_apperances, max($count_most_result_apperances));

            //dd($result_message_id);
            $resultQuiz->result_message_id = $result_message_id[0];
            $resultQuiz->save();
        }

        $resultQuiz->result = $result.'/'.count($this->quiz->questions);
        $resultQuiz->save();

        return redirect()->route('result_show', [$resultQuiz->id]);
    }
}

