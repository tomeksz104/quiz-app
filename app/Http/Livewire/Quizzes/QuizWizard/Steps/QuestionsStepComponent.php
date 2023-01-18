<?php

namespace App\Http\Livewire\Quizzes\QuizWizard\Steps;

use Exception;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\LivewireWizard\Components\StepComponent;
use function view;

class QuestionsStepComponent extends StepComponent
{
    use WithFileUploads;

    public $questions;

    public $quiz_id = null;

    public int $quiz_type, $total_results = 0;

    public array $results;

    public bool $isMount = true;

    protected array $question_pattern =  [
        'title' => '',
        'answers' => [
            [
                'title' => '',
                'correct' => true,
            ],
            [
                'title' => '',
                'correct' => '',
            ]
        ]
    ];

    public function rules()
    {
        return [
            'questions' =>  Rule::when(
                $this->quiz_type !== 3,
                ['array', 'min:1'],
                ['array', 'min:1']
            ),
            'questions.*.title' => ['required', 'min:3'],
            'questions.*.answers.*.title' => ['required', 'min:1'],
            'questions.*.question_thumbnail' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'questions.*.answers.*.answer_thumbnail' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];
    }

    protected $messages = [
        'questions.min' => 'Quiz musi zawierać minimum :min pytanie',
        'questions.*.title.required' => 'Pytanie nie może być puste',
        'questions.*.answers.*.title.required' => 'Pola odpowiedzi nie mogą być puste',
    ];

    public function mount()
    {
        $this->results = $this->state()->forStep('result-messages-step');

        if(isset($this->results['results'])) {
            $count_results = count($this->results['results']);
        }

        if($this->isMount)
        {
            $this->addQuestion();
            $this->isMount = false;
        }
        elseif($this->quiz_type ===  4 && !$this->isMount && $this->total_results !== $count_results)
        {
            foreach($this->questions as $question_key => $question)
            {
                $total_answers = count($question['answers']);

                $result_messages_ids = array_keys($this->results['results']);

               // dump('total answers: '. $total_answers.'| count_results: '.$count_results);
                //dump($result_messages_ids);

                if($total_answers < $count_results)
                {
                    foreach($result_messages_ids as $result_message_id)
                    {
                        //dump($result_message_id);
                        if (!array_key_exists($result_message_id, $question['answers']))
                        {
                            $this->addPsychotestAnswer($question_key, $result_message_id);
                        }
                    }
                }
                elseif($total_answers > $count_results)
                {
                    $result_keys = array_keys($this->results['results']);

                    foreach($question['answers'] as $key => $answer)
                    {
                        if (!in_array($key, $result_keys)) {
                            unset($this->questions[$question_key]['answers'][$key]);
                        }
                    }
                }
            }
            $this->total_results = $count_results;
        }

    }

    public function submit()
    {
        $this->validate();

        $this->nextStep();
    }

    public function addAnswer($key)
    {
        $this->questions[$key]['answers'][] = ['title' => '', 'correct' => ''];
    }

    public function removeAnswer($question_key, $key)
    {
        unset($this->questions[$question_key]['answers'][$key]);
    }

    public function addQuestion()
    {
        if ($this->quiz_type === 4)
        {
            $this->addPsychotestQuestion();
        }
        else
        {
            $this->questions[] = [
                    'title' => '',
                    'answers_type' => 'text',
                    'answers' => [
                        [
                            'title' => '',
                            'correct' => true,
                        ],
                        [
                            'title' => '',
                            'correct' => '',
                        ]
                    ]
                ];
        }
    }

    public function removeQuestion(int $question_key): void
    {
        unset($this->questions[$question_key]);
    }

    public function updateOrder(array $sortableItems)
    {
        foreach($sortableItems as $sortable) {
            $ids = explode('.', $sortable['value']);
            $question_id = $ids[0];
            $answer_id = $ids[1];

            $new_key = $sortable['order']-1;

            $answers[$new_key] = $this->questions[$question_id]['answers'][$answer_id];
        }

        $this->questions[$question_id]['answers'] = $answers;
    }

    public function addPsychotestQuestion() {
        $this->questions[] = [
            'title' => '',
            'answers_type' => 'text',
            'answers' => []
        ];

        $state = $this->state()->forStep('result-messages-step');

        if ($state['results'])
        {
            $last_question_key = array_key_last($this->questions);

            foreach ($state['results'] as $key => $result)
            {
                $this->addPsychotestAnswer($last_question_key, $key);
                /*$this->questions[$last_question_key]['answers'][] = [
                    'title' => '',
                    'result_message_id' => $key,
                ];*/
            }
        }
    }

    private function addPsychotestAnswer($question_key, $result_message_id)
    {
        $this->questions[$question_key]['answers'][] = [
            'title' => '',
            'result_message_id' => $result_message_id,
        ];
    }

    public function updated($name, $value)
    {
        $exploded = explode(".", $name);

        $question_id = $exploded[1];

        $count_exploded  = count($exploded);

        if($count_exploded === 5)
        {
            $answer_id = $exploded[3];
        }

        if(end($exploded) === 'question_thumbnail' || end($exploded) === 'answer_thumbnail') {
            try {
                $this->validateOnly($name);

                $image_data = [
                    'path' => $value->getRealPath(),
                    'filename' => $value->getClientOriginalName(),
                    'file_extension' => $value->getClientOriginalExtension(),
                    'temporary_url' => $value->temporaryUrl(),
                ];

                if($count_exploded === 3)
                {
                    $this->questions[$question_id]['question_thumbnail_state'] = $image_data;

                    $this->questions[$question_id]['question_thumbnail'] = null;
                }
                elseif($count_exploded === 5)
                {
                    $this->questions[$question_id]['answers'][$answer_id]['answer_thumbnail_state'] = $image_data;

                    $this->questions[$question_id]['answers'][$answer_id]['answer_thumbnail'] = null;
                }
            } catch (Exception $e) {
                $this->validateOnly($name);

                if($count_exploded === 3)
                {
                    $this->questions[$question_id]['question_thumbnail'] = null;
                }
                elseif($count_exploded === 5)
                {
                    $this->questions[$question_id]['answers'][$answer_id]['answer_thumbnail'] = null;
                }
            }
        }
    }

    public function deleteThumbnail(int $question_id, $answer_id)
    {
        if(!is_int($answer_id))
        {
            $this->questions[$question_id]['question_thumbnail_state'] = [];
        }
        else
        {
            $this->questions[$question_id]['answers'][$answer_id]['answer_thumbnail_state'] = [];
        }
    }

    public function setTab($tab, $question_id)
    {
        $this->questions[$question_id]['answers_type'] = $tab;
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Dodaj pytania',
            'description' => 'Pytania to kluczowy składnik quizu. Tutaj wszystko zależy od Twojej kreatywności',
        ];
    }

    public function render()
    {
        return view('livewire.Quizzes.quizWizard.steps.questions-step');
    }
}
