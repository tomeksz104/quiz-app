<?php

namespace App\Http\Livewire\User;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class UserQuizzes extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'id';

    protected $listeners = ['refresh' => 'render', 'delete'];

    public function render()
    {
        $quizzes = Quiz::with('user', 'type', 'results', 'image', 'questions')
            ->where('title', 'like', '%'.$this->search.'%')
            ->where('user_id', Auth::user()->id)
            ->orderBy($this->orderBy, 'desc')
            ->paginate($this->perPage);

        return view('livewire.user.user-quizzes',[
            'quizzes' => $quizzes,
            'perPage' =>  $this->perPage,
        ])
            ->extends('layout/main')
            ->section('content');
    }

    public function deleteConfrim($id = NULL) {
        if($id) {
            $this->dispatchBrowserEvent('swal:delete', [
                'title' => 'Usuwanie rekordu',
                'text' => 'Usuwasz rekord/y z bazy danych. Nie będziesz w stanie tego cofnąć!',
                'type' => 'warning',
                'ids' => $id,
            ]);
        }

    }

    public function delete($quiz_id){
        $quiz = Quiz::find($quiz_id);
        $quiz->questions()->delete();
        $quiz->quizView()->delete();
        $quiz->votes()->delete();
        $quiz->comments()->delete();
        $quiz->result_messages()->delete();
        $quiz->results()->delete();
        $quiz->image()->delete();

        $quiz->delete();

        $this->emit('refresh');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
