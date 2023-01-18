<?php

namespace App\Http\Livewire\Quizzes\QuizWizard\Steps;

use App\Enums\QuizStatus;
use App\Models\Category;
use Exception;
use Livewire\WithFileUploads;
use Spatie\LivewireWizard\Components\StepComponent;
use function view;

class QuizDetailsStepComponent extends StepComponent
{
    use WithFileUploads;

    public $quiz_id, $quiz_type, $title, $category, $public = "1", $status = QuizStatus::PENDING, $time_for_answer = "20", $description, $quiz_thumbnail;

    public array $quiz_thumbnail_state = [];

    public array $rules = [
        'title' => 'required|min:3',
        'category' => 'nullable',
        'public' => 'nullable',
        'description' => 'required|min:3',
        'quiz_thumbnail' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        $this->nextStep();
    }

    public function updated($quiz_thumbnail)
    {
        $this->validateOnly($quiz_thumbnail);
    }

    public function updateTaskOrder(array $sortableItems): void
    {
        $this->quiz_thumbnail = null;
    }

    public function updatedQuizThumbnail()
    {
        try {
            $this->validateOnly($this->quiz_thumbnail);

            $this->quiz_thumbnail_state = [
                'path' => $this->quiz_thumbnail->getRealPath(),
                'filename' => $this->quiz_thumbnail->getClientOriginalName(),
                'file_extension' => $this->quiz_thumbnail->getClientOriginalExtension(),
                'temporary_url' => $this->quiz_thumbnail->temporaryUrl(),
            ];

            $this->quiz_thumbnail = null;
        } catch (Exception $e) {
            $this->validateOnly($this->quiz_thumbnail);

            $this->quiz_thumbnail = null;
        }
    }

    public function deleteThumbnail()
    {
        $this->quiz_thumbnail_state = [];
    }


    public function stepInfo(): array
    {
        return [
            'label' => 'Podstawowe dane',
            'description' => 'Tytuł i miniaturka są najważniejsze - to one decydują o popularności Twojego quizu!',
        ];
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'desc')
            ->withCount('quizzes')
            ->get();


        return view('livewire.Quizzes.quizWizard.steps.quiz-details-step',[
            'categories' => $categories,
        ]);
    }
}
