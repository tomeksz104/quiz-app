<?php

namespace App\Http\Livewire\Quizzes;

use App\Enums\QuizStatus;
use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class PendingQuizzes extends Component
{
    use WithPagination;

    public function render()
    {
        $quizzes = Quiz::where('status', QuizStatus::PENDING)
            //->andWhere('status', QuizStatus::PENDING)
            ->orderBy('created_at', 'desc')
            ->with('category', 'image', 'user')
            ->paginate(14);

        return view('livewire.quizzes.pending-quizzes',[
            'quizzes' => $quizzes,
        ]);
    }
}
