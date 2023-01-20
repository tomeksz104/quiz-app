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

        return view('livewire.User.user-quizzes',[
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

        foreach($quiz->questions as $question) // foreach because with mass deletion, Observer will not work
        {
            foreach($question->answers as $answer)
            {
                $answer->delete();
            }
            $question->delete();
        }
        foreach($quiz->result_messages as $result_message)
        {
            $result_message->delete();
        }
        foreach($quiz->result_messages as $result_message) // foreach because with mass deletion, Observer will not work
        {
            $result_message->delete();
        }
        $quiz->delete();


        $this->emit('refresh');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
