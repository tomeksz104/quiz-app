<?php

namespace App\Http\Livewire\Quizzes\QuizWizard;

use App\Http\Livewire\Quizzes\QuizWizard\Steps\QuestionsStepComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\QuizDetailsStepComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\ResultMessagesStepComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\SaveQuizStepComponent;
use App\Models\Quiz;
use Spatie\LivewireWizard\Components\WizardComponent;
use function asset;

class QuizWizardComponent extends WizardComponent
{
    public int $quiz_type;

    protected array $steps = [
        'quiz-details-step',
        'questions-step',
        'result-messages-step',
        'save-quiz-step'
    ];

    public function mount(string $quiz_id)
    {
        $this->quiz_id = $quiz_id ?? null;
    }

    public function initialState(): array
    {
        $quiz = Quiz::find($this->quiz_id);

        if(isset($quiz))
        {
            foreach($quiz->questions as $key => $question)
            {
                $questions_state[$key] =
                    [
                        'id' => $question->id,
                        'title' => $question->title,
                        'answers_type' => 'text',
                        'question_thumbnail_state' => [ 'temporary_url' => (isset($question->image->path)) ? asset($question->image->path) : null ],
                    ];

                foreach($question->answers as $answer_key => $answer)
                {
                    $questions_state[$key]['answers'][$answer->result_message_id ?? $answer_key] =
                        [
                            'id' => $answer->id,
                            'title' => $answer->title,
                            'correct' => (bool) $answer->correct,
                            'result_message_id' => $answer->result_message_id ?? null,
                            'answer_thumbnail_state' => [ 'temporary_url' => (!isset($answer->image->path)) ?: asset($answer->image->path)],
                        ];
                }
            }
            if($quiz->result_messages()->exists())
            {
                foreach($quiz->result_messages as $key => $result_message)
                {
                    $result_messages_state[$result_message->id] =
                        [
                            'database_id' => $result_message->id,
                            'title' => $result_message->title,
                            'description' => $result_message->description,
                            'rating_from' => $result_message->rating_from,
                            'result_thumbnail_state' => [ 'temporary_url' => (isset($result_message->image->path)) ? asset($result_message->image->path) : null ],
                        ];
                }
                $tab = 'custom';
            }

            $state = [
                'quiz-details-step' => [
                    'quiz_id' => $quiz->id,
                    'quiz_type' => $this->quiz_type,
                    'title' => $quiz->title,
                    'category' => $quiz->category_id,
                    'public' => $quiz->public,
                    'status' => $quiz->status,
                    'time_for_answer' => $quiz->time_for_answer,
                    'description' => $quiz->description,
                    'quiz_thumbnail_state' => [ 'temporary_url' => (isset($quiz->image->path)) ? asset($quiz->image->path) : null ],
                ],
                'questions-step' => [
                    'quiz_type' => $this->quiz_type,
                    'quiz_id' => $quiz->id,
                    'isMount' => false,
                    'questions' => $questions_state ?? null,
                ],
                'result-messages-step' => [
                    'quiz_type' => $this->quiz_type,
                    'tab' => $tab ?? 'default',
                    'results' => $result_messages_state ?? array(),
                ],
                'save-quiz-step' => [
                    'quiz_type' => $this->quiz_type,
                ],

            ];
        } else {
            $state = array_fill_keys($this->steps,  ['quiz_type' => $this->quiz_type]);
        }

        if($this->quiz_type === 5) { // quiz_type = Co wolisz?
            unset($state["result-messages-step"]);
        }

        return $state;
    }

    public function steps(): array
    {
        if ($this->quiz_type === 4) { // quiz_type = Psychotest
            return [
                QuizDetailsStepComponent::class,
                ResultMessagesStepComponent::class,
                QuestionsStepComponent::class,
                SaveQuizStepComponent::class,
            ];
        }
        elseif ($this->quiz_type === 5) { // quiz_type = Co wolisz?
            return [
                QuizDetailsStepComponent::class,
                QuestionsStepComponent::class,
                SaveQuizStepComponent::class,
            ];
        }
        else {                           // other quizzes
            return [
                QuizDetailsStepComponent::class,
                QuestionsStepComponent::class,
                ResultMessagesStepComponent::class,
                SaveQuizStepComponent::class,
            ];
        }
    }
}
