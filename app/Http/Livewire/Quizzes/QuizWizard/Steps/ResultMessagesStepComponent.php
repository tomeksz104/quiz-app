<?php

namespace App\Http\Livewire\Quizzes\QuizWizard\Steps;

use App\Models\ResultMessage;
use Exception;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\LivewireWizard\Components\StepComponent;
use function view;

class ResultMessagesStepComponent extends StepComponent
{
    use WithFileUploads;

    public int $quiz_type;

    public $tab = 'default';

    public array $results;

    public bool $isMount = false;

    public $result_thumbnail;

    public array $result_pattern =  [
        'title' => '',
        'description' => '',
    ];

    public function rules()
    {
        return [
            'results' => Rule::when(
                $this->tab == 'custom',
                ['required', 'array', 'min:2'],
                ['nullable']
            ),
            'results.*.title' => Rule::when(
                $this->tab == 'custom',
                ['required'],
                ['nullable']
            ),
            'results.*.result_thumbnail' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ];
    }

    protected $messages = [
        'results.min' => 'Wymagane minimum :min wyniki',
        'results.*.title.required' => 'Tytuł wyniku nie może byc pusty.',
    ];

    public function mount()
    {
        if($this->quiz_type === 1 || $this->quiz_type === 2 || $this->quiz_type === 3)
        {
            $this->default_results = ResultMessage::where('default', 1)->with('image')->orderBy('rating_from')->get()->toArray();
        }
        elseif($this->quiz_type === 4) // Psychotest
        {
            $this->tab = 'custom';
        }

        if($this->isMount === false) {
            if(is_null($this->state()->forStep('quiz-details-step')['quiz_id']))
            {
                $this->addResult();
            }
            $this->isMount = true;
        }
    }

    public function submit()
    {
        $this->validate();

        $this->nextStep();
    }

    public function addResult()
    {
        $this->results[] = [
            'title' => '',
            'description' => '',
            'rating_from' => (empty($this->results)) ? $this->default_results[0]['rating_from'] ?? null : $this->default_results[array_key_last($this->results)+1]['rating_from'] ?? null,
            'placeholders' => [
                'title' => (empty($this->results)) ? $this->default_results[0]['title'] ?? null : $this->default_results[array_key_last($this->results)+1]['title'] ?? null,
                'description' => (empty($this->results)) ? $this->default_results[0]['description'] ?? null : $this->default_results[array_key_last($this->results)+1]['description'] ?? null,
            ],
        ];


    }
    public function removeResult($result_key)
    {
        unset($this->results[$result_key]);
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function updated($name, $value)
    {
        $id = explode(".", $name);
        $id = $id[1];

        $exploded = explode('.', $name);

        if(end($exploded) === 'result_thumbnail') {
            try {
                $this->validateOnly($name);

                $this->results[$id]['result_thumbnail_state'] = [
                    'path' => $value->getRealPath(),
                    'filename' => $value->getClientOriginalName(),
                    'file_extension' => $value->getClientOriginalExtension(),
                    'temporary_url' => $value->temporaryUrl(),
                ];

                $this->results[$id]['result_thumbnail'] = null;
            } catch (Exception $e) {
                $this->validateOnly($name);

                $this->results[$id]['result_thumbnail'] = null;
            }
        }
    }

    public function deleteThumbnail($id)
    {
        $this->results[$id]['result_thumbnail_state'] = [];
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Wyniki',
            'description' => 'Dodaj odpowiedzi w zależności od uzyskanych wyników jeśli masz ochotę.',
        ];
    }

    public function render()
    {
        return view('livewire.Quizzes.quizWizard.steps.result-messages-step');
    }
}
