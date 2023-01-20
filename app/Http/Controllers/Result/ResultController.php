<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\ResultMessage;
use App\Models\ResultsQuestion;
use App\Models\ResultsQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

class ResultController extends Controller
{
    public function show(Request $request) {
        $result_quiz = ResultsQuiz::findOrFail($request->route('result_quiz_id'));

        $result_questions = ResultsQuestion::where('result_quiz_id', $result_quiz->id)
            ->with('question', 'question.answers')
            ->get();

        $quiz_type = $result_quiz->quiz->quiz_type;

        $result = explode('/',$result_quiz->result);
        $correct_answers = $result[0];
        $total_questions = $result[1];

        if($quiz_type == 1 || $quiz_type == 2 || $quiz_type == 3)
        {
            $percentage_of_correct_answers = $correct_answers/$total_questions*100;

            $result_message = ResultMessage::where('quiz_id', $result_quiz->quiz_id)
                ->orderBy('rating_from', 'desc')
                ->where('rating_from', '<=', $percentage_of_correct_answers)
                ->first();

            if(!$result_message)
            {
                $result_message = ResultMessage::where('default', 1)
                    ->orderBy('rating_from', 'desc')
                    ->where('rating_from', '<=', $percentage_of_correct_answers)
                    ->first();
            }
        }
        elseif($quiz_type == 4) // Psychotest
        {
            foreach($result_questions as $question)
            {
                $aswers_ids[] = $question->question_answer_id;
            }
            $question_answers = Answer::whereIn('id', $aswers_ids)
                ->get('result_message_id')
                ->toArray();

            $count_most_result_apperances = array_count_values(array_column($question_answers, 'result_message_id'));

            $result_message_id = array_keys($count_most_result_apperances, max($count_most_result_apperances));

            $result_message = ResultMessage::findOrFail($result_message_id)->first();
        }

        foreach($result_questions as $question) {
            $questions_ids[] = $question->question_id;
        }

        if(!empty($questions_ids))
        {
            $answers_result_percentage = ResultsQuestion::GetPercentageResultForAnswers($questions_ids);
        }


        return view('result.result-show', [
                "result_quiz" => $result_quiz,
                "result_questions" => $result_questions,
                "result_message" => $result_message ?? null, // returns null when quiz type = "Co wolisz?"
                "percentage_of_correct_answers" => (int) $percentage_of_correct_answers ?? null,
                "answers_result_percentage" => $answers_result_percentage ?? null,
                "total_questions" => $total_questions,
        ]);
    }

    public function list()
    {
        $result_quizzes = ResultsQuiz::with('user', 'message', 'quiz.image', 'quiz.questions', 'quiz.type')->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('user.user-activity', [
            'result_quizzes' => $result_quizzes ?? null,
            'total_user_results' => $result_quizzes->count(),
        ]);
    }
}
