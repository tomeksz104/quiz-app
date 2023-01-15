<?php

namespace App\Http\Livewire\Components;

use App\Models\Quiz;
use App\Models\QuizVote;
use Livewire\Component;
use function auth;
use function request;
use function view;

class QuizVotes extends Component
{
    public $quiz_id, $dark_mode;
    public $voted;

    public function mount($quiz_id)
    {
        $this->quiz_id = $quiz_id;

        $this->quiz = Quiz::where('id', $this->quiz_id)->first();
    }

    public function render()
    {
        $this->vote_id = $this->quiz->isVoted()->first();

        if(!$this->vote_id) { // this will test if the user voted the quiz or not
            $this->voted = false;
        } else {
            $this->voted = true;
        }

        return view('livewire.components.quiz-votes');
    }

    public function vote()
    {
        if($this->voted) {
            QuizVote::find($this->vote_id)->delete();
            $this->quiz->decrement('votes');

            $this->voted = false;
        } else
        {
            QuizVote::create([
                'quiz_id' => $this->quiz_id,
                'user_id' => auth()->id() ?? null,
                'ip' => request()->ip(),
            ]);

            $this->quiz->increment('votes');

            $this->voted = true;
        }
    }
}
