<?php

namespace App\Http\Livewire\Admin;

use App\Enums\QuizStatus;
use App\Models\Quiz;
use App\Models\ResultMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Quizzes extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'id';
    public $selectedPages = [];
    public $selectedQuizzes = [];
    public $activeBulkDelete = false;
    public $selectAll = false;
    public $tab = 'approved';

    protected $listeners = ['refresh' => 'render', 'delete'];

    public function render()
    {
        $quizzes = Quiz::with('user', 'type', 'results', 'image', 'questions')
            ->where('title', 'like', '%'.$this->search.'%')
            ->orderBy($this->orderBy, 'desc');

        if($this->tab == QuizStatus::APPROVED)
        {
            $quizzes->where('status', QuizStatus::APPROVED);
        }
        elseif($this->tab == QuizStatus::PENDING)
        {
            $quizzes->where('status', QuizStatus::PENDING);
        }

        return view('livewire.admin.quizzes',[
            'quizzes' => $quizzes->paginate($this->perPage),
            'perPage' =>  $this->perPage,
        ])
            ->extends('layout/main')
            ->section('content');
    }

    public function deleteConfrim($ids = NULL) {
        if($this->selectedQuizzes || $ids) {
            $this->dispatchBrowserEvent('swal:delete', [
                'title' => 'Usuwanie rekordu',
                'text' => 'Usuwasz rekord/y z bazy danych. Nie będziesz w stanie tego cofnąć!',
                'type' => 'warning',
                'ids' => $ids ?? $this->selectedQuizzes,
            ]);
        }

    }

    public function delete($ids){
        foreach((array) $ids as $key => $quizId) {
            $quiz = Quiz::find($quizId);
            $quiz->questions()->delete();
            $quiz->quizView()->delete();
            $quiz->votes()->delete();
            $quiz->comments()->delete();
            $quiz->result_messages()->delete();
            $quiz->results()->delete();
            $quiz->image()->delete();

            $quiz->delete();
        }

        $this->selectedPages = [];
        $this->activeBulkDelete = false;
        $this->selectAll = false;
        $this->selectedQuizzes = [];

        $this->emit('refresh');
    }

    public function addSelectedQuiz($id)
    {
        if(!in_array($id, $this->selectedQuizzes)) {
            $this->selectedQuizzes[] = ''.$id.'';
        } else {
            $key = array_search($id, $this->selectedQuizzes);
            unset($this->selectedQuizzes[$key]);
        }
        $this->updatedSelectedQuizzes();
    }

    public function updatedSelectAll($value)
    {
        $quizzes = Quiz::where('title', 'like', '%'.$this->search.'%')
            ->orderBy($this->orderBy, 'desc')
            ->paginate($this->perPage)
            ->pluck('id')
            ->toArray();

        if($value)
        {
            $this->selectedPages[] = $this->page;
            foreach ($quizzes as $quiz) {
                if(!in_array($quiz,$this->selectedQuizzes)) {
                    $this->selectedQuizzes[] = ''.$quiz.'';
                }
            }
        }
        else
        {
            unset($this->selectedPages[array_search($this->page, $this->selectedPages)]);
            foreach ($quizzes as $quiz)
            {
                $key = array_search($quiz, $this->selectedQuizzes);
                unset($this->selectedQuizzes[$key]);
            }
        }
        $this->updatedSelectedQuizzes();
    }

    public function updatedSelectedQuizzes(): bool
    {
        if($this->selectedQuizzes) {
            $this->activeBulkDelete = true;
        } else {
            $this->activeBulkDelete = false;
        }
        return $this->activeBulkDelete;
    }

    public function updatedPage(): bool
    {
        if(in_array($this->page,$this->selectedPages)) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
        return $this->selectAll;
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
