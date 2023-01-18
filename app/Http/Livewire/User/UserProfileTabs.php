<?php

namespace App\Http\Livewire\User;

use App\Models\Comment;
use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class UserProfileTabs extends Component
{
    use WithPagination;

    public $tab = 'quizzes';

    protected $quizzes, $comments, $liked_quizzes, $pending_quizzes;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function render()
    {
        switch ($this->tab) {
            case 'quizzes':
                $this->quizzes =  Quiz::where('user_id', $this->user_id)
                                            ->with('category', 'image', 'comments',  'user')
                                            ->paginate(12);

            case 'comments':
                $this->comments =  Comment::where('user_id', $this->user_id)
                                            ->with('commentable', 'commentable.image', 'user')
                                            ->paginate(12);

            case 'liked_quizzes':
                $this->liked_quizzes = Quiz::whereHas('votes', function ($query) {
                                            return $query->where('user_id', $this->user_id);
                                            })->with('category', 'image', 'comments', 'user')->paginate(12);

            case 'pending_quizzes':
                $this->pending_quizzes =  Quiz::where('user_id', $this->user_id)
                                            ->with('category', 'image', 'comments', 'user')
                                            ->pending()
                                            ->paginate(12);
        }

        return view('livewire.User.user-profile-tabs');
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
    }
}
