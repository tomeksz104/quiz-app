<?php

namespace App\Http\Livewire\Quizzes;

use App\Enums\QuizStatus;
use App\Models\Category;
use App\Models\CategoryView;
use App\Models\Quiz;
use App\Models\QuizType;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class Quizzes extends Component
{
    use WithPagination;

    public $fields = [
        'created_at' => 'Najnowsze',
        'views' => 'Wyświetlenia',
        'votes' => 'Polubienia'
    ];

    public $sortField = 'created_at';

    public $selectedCategories = [];

    public $quiz_type = 'all';

    public function mount(Request $request)
    {
        if($request->query('category'))
        {
            $selectedCategory = Category::where('slug', $request->query('category'))->first();

            if(!($selectedCategory->showCategory()))
            {
                $selectedCategory->increment('views');  //I have a separate column for views in the quiz table. This will increment the views column in the quizzes table.
                CategoryView::createViewLog($selectedCategory);
            }
            $this->selectedCategories[] = $selectedCategory->id;
        }
    }

    public function sortBy($field)
    {
        $this->sortField = $field;
    }

    public function selectCategory($id)
    {
        if (in_array($id, $this->selectedCategories))
        {
            $this->selectedCategories = array_filter($this->selectedCategories, function ($el) use ($id) {
                return $el !== $id;
            });
        }
        else
        {
            $this->selectedCategories[] = $id;
        }
    }

    public function resetCategories()
    {
        $this->selectedCategories = [];
    }

    public function setTab($id)
    {
        $this->quiz_type = $id;
    }

    public function render()
    {
        $quizzes = Quiz::orderBy($this->sortField, 'desc')
            ->with('category', 'image', 'user', 'type', 'comments', 'questions')
            ->where('status', QuizStatus::APPROVED);

        if($this->quiz_type !== 'all')
        {
            $quizzes = $quizzes->where('quiz_type', $this->quiz_type);
        }

        if(!empty($this->selectedCategories))
        {
            $quizzes = $quizzes->whereIn('category_id', $this->selectedCategories);
        }

        $quizzes = $quizzes->paginate(10);

        return view('livewire.quizzes.quizzes', [
            'quizzes' => $quizzes,
            'selectedCategory' => $selectedCategory ?? null,
            'categories' =>  Category::select('id','title')->get(),
            'quiz_types' => QuizType::select('id', 'title')->get(),
        ]);
    }

}
