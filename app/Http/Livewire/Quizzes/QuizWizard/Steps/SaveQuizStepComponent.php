<?php

namespace App\Http\Livewire\Quizzes\QuizWizard\Steps;

use App\Enums\QuizStatus;
use App\Enums\UserRole;
use App\Models\Answers;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\ResultMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Spatie\LivewireWizard\Components\StepComponent;
use function view;

class SaveQuizStepComponent extends StepComponent
{
    public int $quiz_type;

    public bool $isSave = false;

    public array $result_message_saved_ids = [];

    public array $rules = [];

    public function submit()
    {
        $this->validate();
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Zapisz',
            'preview' => true
        ];
    }
    public function saveQuiz()
    {
        $quiz_details = $this->state()->forStep('quiz-details-step');
        $questions_state = $this->state()->forStep('questions-step');
        $result_messages = $this->state()->forStep('result-messages-step');

        // Saving quiz details
        $quiz = Quiz::updateOrCreate([
            'id' => $quiz_details['quiz_id'] ?? null
        ], [
            'quiz_type' => $quiz_details['quiz_type'],
            'title' => $quiz_details['title'],
            'user_id' => Auth::user()->id,
            'category_id' => $quiz_details['category'] ?? 17,
            'description' => $quiz_details['description'],
            'time_for_answer' => $this->quiz_type === 2 ? $quiz_details['time_for_answer'] : null,
            'status' =>  Auth::user()->role === UserRole::ADMIN ? $quiz_details['status'] : QuizStatus::PENDING,
            'public' => $quiz_details['public']
        ]);

        // Saving Quiz Thumbnail
        if(array_key_exists('path', $quiz_details['quiz_thumbnail_state']))
        {
            $generate_unique_filename = uniqid('quiz_thumbnail_') . time() . '.' . $quiz_details['quiz_thumbnail_state']['file_extension'];
            $move_path = 'uploads/images/'.$generate_unique_filename;

            $isMoved = File::move($quiz_details['quiz_thumbnail_state']['path'], $move_path);

            if($isMoved)
            {
                $quiz->image()->create([
                    'path' => $move_path
                ]);
            }
        }
        elseif(!empty($quiz->image->path) && empty($quiz_details['quiz_thumbnail_state']) && file_exists(public_path($quiz->image->path)))
        {
            unlink(public_path($quiz->image->path));  // delete file if exists
            $quiz->image->delete();
        }

        // Saving result messages
        $result_messages_to_sync = [];

        if ($this->quiz_type !== 5 && (isset($result_messages['tab']) && $result_messages['tab'] == 'custom')) // quiz_type !== Co wolisz?
        {
            foreach ($result_messages['results'] as $key => $result)
            {
                $result_message_model = ResultMessage::updateOrCreate([
                    'id' =>  isset($result['database_id']) ? $result['database_id'] : null
                ], [
                    'title' => $result['title'],
                    'description' => $result['description'],
                    'quiz_id' => $quiz->id,
                    'rating_from' => $result['rating_from'] ?? null,
                ]);

                if ($this->quiz_type === 4)
                {
                    $this->result_message_saved_ids[$key] =
                    [
                        'database_id' => $result_message_model->id,
                    ];
                }

                // Saving Result Thumbnail
                if(isset($result['result_thumbnail_state']) && array_key_exists('path', $result['result_thumbnail_state']))
                {
                    $generate_unique_filename = uniqid('result_thumbnail_') . time() . '.' . $result['result_thumbnail_state']['file_extension'];
                    $move_path = 'uploads/images/'.$generate_unique_filename;

                    $isMoved = File::move($result['result_thumbnail_state']['path'], $move_path);

                    if($isMoved)
                    {
                        $result_message_model->image()->create([
                            'path' => $move_path
                        ]);
                    }
                }
                elseif(!empty($result_message_model->image->path) && empty($result['result_thumbnail_state']) && file_exists(public_path($result_message_model->image->path)))
                {
                    unlink(public_path($result_message_model->image->path));  // delete file if exists
                    $result_message_model->image->delete();
                }
                $result_messages_to_sync[] = $result_message_model->id;
            }
            $quiz->result_messages()->whereNotIn('id', $result_messages_to_sync)->delete();
        }
        else
        {
            $quiz->result_messages()->delete();
        }

        // Saving questions
        $questions_to_sync = [];

       foreach($questions_state['questions'] as $question)
        {
            $question_model = Question::updateOrCreate([
                'id' =>  $question['id'] ?? null
            ], [
                'title' => $question['title'],
                'quiz_id' => $quiz->id,
            ]);

            // Saving Question Thumbnail
            if(isset($question['question_thumbnail_state']) && array_key_exists('path', $question['question_thumbnail_state']))
            {
                $generate_unique_filename = uniqid('question_thumbnail_') . time() . '.' . $question['question_thumbnail_state']['file_extension'];
                $move_path = 'uploads/images/'.$generate_unique_filename;

                $isMoved = File::move($question['question_thumbnail_state']['path'], $move_path);

                if($isMoved)
                {
                    $question_model->image()->create([
                        'path' => $move_path
                    ]);
                }
            }
            elseif(!empty($question_model->image->path) && empty($question['question_thumbnail_state']) && file_exists(public_path($question_model->image->path)))
            {
                unlink(public_path($question_model->image->path));  // delete file if exists
                $question_model->image->delete();
            }

            $questions_to_sync[] = $question_model->id;

            // Saving answers
            $answers_to_sync = [];
            foreach ($question['answers'] as $answer)
            {
                $answer_model = Answers::updateOrCreate([
                    'id' =>  $answer['id'] ?? null
                ], [
                    'title' => $answer['title'],
                    'correct' => $answer['correct'] ?? null,
                    'question_id' => $question_model->id,
                    'result_message_id' => ($this->quiz_type === 4)
                        ? $this->result_message_saved_ids[$answer['result_message_id']]['database_id']
                        : null,
                ]);

                // Saving Answer Thumbnail
                if(isset($answer['answer_thumbnail_state']) && array_key_exists('path', $answer['answer_thumbnail_state']))
                {
                    $generate_unique_filename = uniqid('answer_thumbnail_') . time() . '.' . $answer['answer_thumbnail_state']['file_extension'];
                    $move_path = 'uploads/images/'.$generate_unique_filename;

                    $isMoved = File::move($answer['answer_thumbnail_state']['path'], $move_path);

                    if($isMoved)
                    {
                        $answer_model->image()->create([
                            'path' => $move_path
                        ]);
                    }
                }
                elseif(!empty($answer_model->image->path) && empty($answer['answer_thumbnail_state']) && file_exists(public_path($answer_model->image->path)))
                {
                    unlink(public_path($answer_model->image->path));  // delete file if exists
                    $answer_model->image->delete();
                }
                $answers_to_sync[] = $answer_model->id;
            }
            $question_model->answers()->whereNotIn('id', $answers_to_sync)->delete();
        }

       $quiz->questions()->whereNotIn('id', $questions_to_sync)->delete();

        return $quiz;
    }

    public function render()
    {
        if($this->isSave === false) {
            $quiz = $this->saveQuiz();
            $this->isSave = true;
        }

        return view('livewire.quizzes.quizWizard.steps.save-quiz-step',[
            'quiz' => $quiz
        ]);
    }
}
