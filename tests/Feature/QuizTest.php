<?php

namespace Tests\Feature;

use App\Http\Livewire\Comments\Comments;
use App\Http\Livewire\Components\QuizVotes;
use App\Http\Livewire\Components\TakeQuiz;
use App\Http\Livewire\Modals\Search;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizType;
use App\Models\User;
use Database\Seeders\ResultMessagesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class QuizTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function  test_solve_quiz_with_0_percentage_correct_answers()
     {
        $this->seed(ResultMessagesSeeder::class);

         // Create DataBase
        $quiz = Quiz::factory()
        ->create(['id' => 555, 'quiz_type' => QuizType::factory()->create()])
        ->each(function ($quiz) {
             // Create Models Support
             $questions = Question::factory()->count(5)->create(['quiz_id' => 555]);

             foreach($questions as $question)
             {
                Answer::factory()->count(4)->create(['question_id' =>$question->id, 'correct' => 0]);
             }
         });

         Livewire::test(TakeQuiz::class, [555])
             ->assertSee('PYTANIE 1/5')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 2/5')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 3/5')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 4/5')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 5/5')
             ->call('nextQuestion')
             ->assertRedirect('/result/1');

        $this->get("/result/1")
            ->assertOk()
            ->assertSee('0%')
            ->assertSee('No cóż...');
     }

     public function test_solve_quiz_with_100_percentage_correct_answers()
     {
        $this->seed(ResultMessagesSeeder::class);

         // Create DataBase
        $quiz = Quiz::factory()
        ->create(['id' => 556, 'quiz_type' => QuizType::factory()->create()])
        ->each(function ($quiz) {
             // Create Models Support
             $questions = Question::factory()->count(5)->create(['quiz_id' => 556]);

             foreach($questions as $question)
             {
                Answer::factory()->count(4)->create(['question_id' =>$question->id, 'correct' => 1]);
             }
         });

         Livewire::test(TakeQuiz::class, [556])
             ->assertSee('PYTANIE 1/5')
             ->toggle('question_answers.1')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 2/5')
             ->toggle('question_answers.2')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 3/5')
             ->toggle('question_answers.3')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 4/5')
             ->toggle('question_answers.4')
             ->call('nextQuestion')
             ->assertSee('PYTANIE 5/5')
             ->toggle('question_answers.5')
             ->call('nextQuestion')
             ->assertRedirect('/result/1');

        $this->get("/result/1")
            ->assertOk()
            ->assertSee('100')
            ->assertSee('Fenomenalnie!');
     }


    public function test_quiz_can_be_rendered()
    {
        $anakin = User::factory()->anakin()->create();

        $quiz = Quiz::factory()->create(['user_id' => $anakin->id]);
        Quiz::factory()->count(5)->create();
        $comment = Comment::factory()->count(3)->create(['commentable_id' => $quiz->id]);

        $this->get("/quiz/{$quiz->slug}")
            ->assertOk()
            ->assertSee($quiz->title)
            ->assertSee($quiz->description)
            ->assertSee($quiz->type->title)
            ->assertSee($quiz->category->title)
            ->assertSee($quiz->views+1)
            ->assertSee($quiz->votes)
            ->assertSee('Anakin')
            ->assertSee($comment[0]->user->username)
            ->assertSee($comment[0]->body)
            ->assertSee($comment[1]->user->username)
            ->assertSee($comment[1]->body)
            ->assertSee($comment[2]->user->username)
            ->assertSee($comment[2]->body)
            ->assertSee('Może Ci się spodobać');
    }

    public function test_login_info_in_comments_section_for_unauthenticated_user()
    {
        $quiz =  Quiz::factory()->create();

        $this->get("/quiz/{$quiz->slug}")
            ->assertOk()
            ->assertSee('Zaloguj się')
            ->assertSee('aby skomentować');
    }

    function test_quiz_page_contains_quiz_comments_livewire_component()
    {
        $quiz =  Quiz::factory()->create();

        $this->get("/quiz/{$quiz->slug}")->assertSeeLivewire(Comments::class);
    }

    public function test_user_can_comment_quiz()
    {
        $quiz =  Quiz::factory()->create();

        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(Comments::class, ['model' => $quiz])
            ->set('newCommentState.body', 'foo_bar')
            ->call('postComment');

        $this->get("/quiz/{$quiz->slug}")
            ->assertOk()
            ->assertSee($user->username)
            ->assertSee('foo_bar');
    }

    function test_quiz_page_contains_quiz_votes_livewire_component()
    {
        $quiz =  Quiz::factory()->create();

        $this->get("/quiz/{$quiz->slug}")->assertSeeLivewire(QuizVotes::class);
    }

    public function test_user_can_vote_and_unvote_quiz()
    {
        $votes = 999;
        $quiz =  Quiz::factory()->create(['votes' => $votes]);

        $this->get("/quiz/{$quiz->slug}")
            ->assertOk()
            ->assertSee($votes);

        $this->actingAs(User::factory()->create());

        Livewire::test(QuizVotes::class, ['quiz_id' => $quiz->id])
            ->call('vote');

        $this->get("/quiz/{$quiz->slug}")
            ->assertOk()
            ->assertSee($votes+1);

        Livewire::test(QuizVotes::class, ['quiz_id' => $quiz->id])
            ->call('vote');

        $this->get("/quiz/{$quiz->slug}")
            ->assertOk()
            ->assertSee($votes);
    }

    public function test_search_quizzes()
    {
        $this->seed();

        Livewire::test(Search::class)
            ->set('search', 'film')
            ->assertSee('Ciekawy quiz o hollywoodzkich filmach')
            ->assertSee('Sprawdź swoją wiedzę z filmu „To nie wypanda”!');
    }
}
