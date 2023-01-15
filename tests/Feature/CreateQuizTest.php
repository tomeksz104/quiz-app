<?php

namespace Tests\Feature;

use App\Http\Livewire\QuizVotes;
use App\Http\Livewire\Quizzes\QuizWizard\QuizWizardComponent;
use App\Http\Livewire\TakeQuiz;
use App\Models\Answers;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizType;
use App\Models\User;
use Database\Seeders\QuizTypesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateQuizTest extends TestCase
{
    use RefreshDatabase;

    public function test_select_quiz_type_can_be_rendered()
    {
        $quiz_type = QuizType::factory()->create();

        $response = $this->get('/wybierz-typ');

        $response->assertStatus(200)
            ->assertSee($quiz_type->title);
    }

    public function test_create_knowledge_quiz()
     {
        $this->seed(QuizTypesSeeder::class);

        $this->actingAs(User::factory()->create());

        $data = [
            'quiz_title' => fake()->sentence(1),
            'description' => fake()->text(),
            'question' => [
                'title' => fake()->sentence(1),
                'answers' => [
                    [
                        'title' => fake()->sentence(1)
                    ],
                    [
                        'title' => fake()->sentence(1)
                    ]
                ]
            ]
        ];

        $wizard = Livewire::test(QuizWizardComponent::class, ['quiz_type' => 1, 'quiz_id' => 'null']);

        $wizard->assertSee('Podstawowe dane')
            ->assertSee('Dodaj pytania')
            ->assertSee('Wyniki')
            ->assertSee('Dodaj obrazek na okładkę');

        $quizDetailsState = $wizard->getStepState('quiz-details-step');

        Livewire::test('quiz-details-step', $quizDetailsState)
            ->set('title', $data['quiz_title'])
            ->set('description', $data['description'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Pytanie 1');

        $questionsState = $wizard->getStepState('questions-step');

        Livewire::test('questions-step', $questionsState)
            ->set('questions.0.title', $data['question']['title'])
            ->set('questions.0.answers.0.title', $data['question']['answers'][0]['title'])
            ->set('questions.0.answers.1.title', $data['question']['answers'][1]['title'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Uzupełnianie wyników jest opcją dodatkową.');

        $resultMessagesState = $wizard->getStepState('result-messages-step');

        Livewire::test('result-messages-step', $resultMessagesState)
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Świetnie! Twój quiz został utworzony.');

        $this->assertDatabaseHas(Quiz::class, ['title' => $data['quiz_title'], 'description' => $data['description']]);
        $this->assertDatabaseHas(Question::class, ['title' => $data['question']['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][0]['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][1]['title']]);
    }

    public function test_create_timed_quiz()
     {
        $this->seed(QuizTypesSeeder::class);

        $this->actingAs(User::factory()->create());

        $data = [
            'quiz_title' => fake()->sentence(1),
            'description' => fake()->text(),
            'question' => [
                'title' => fake()->sentence(1),
                'answers' => [
                    [
                        'title' => fake()->sentence(1)
                    ],
                    [
                        'title' => fake()->sentence(1)
                    ]
                ]
            ]
        ];

        $wizard = Livewire::test(QuizWizardComponent::class, ['quiz_type' => 2, 'quiz_id' => 'null']);

        $wizard->assertSee('Podstawowe dane')
            ->assertSee('Czas na odpowiedź')
            ->assertSee('Dodaj obrazek na okładkę');

        $quizDetailsState = $wizard->getStepState('quiz-details-step');

        Livewire::test('quiz-details-step', $quizDetailsState)
            ->set('title', $data['quiz_title'])
            ->set('description', $data['description'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Pytanie 1');

        $questionsState = $wizard->getStepState('questions-step');

        Livewire::test('questions-step', $questionsState)
            ->set('questions.0.title', $data['question']['title'])
            ->set('questions.0.answers.0.title', $data['question']['answers'][0]['title'])
            ->set('questions.0.answers.1.title', $data['question']['answers'][1]['title'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Uzupełnianie wyników jest opcją dodatkową.');

        $resultMessagesState = $wizard->getStepState('result-messages-step');

        Livewire::test('result-messages-step', $resultMessagesState)
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Świetnie! Twój quiz został utworzony.');

        $this->assertDatabaseHas(Quiz::class, ['title' => $data['quiz_title'], 'description' => $data['description']]);
        $this->assertDatabaseHas(Question::class, ['title' => $data['question']['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][0]['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][1]['title']]);
    }

    public function test_create_riddle_quiz()
    {
        $this->seed(QuizTypesSeeder::class);

        $this->actingAs(User::factory()->create());

        $data = [
            'quiz_title' => fake()->sentence(1),
            'description' => fake()->text(),
            'question' => [
                'title' => fake()->sentence(1),
                'answers' => [
                    [
                        'title' => fake()->sentence(1)
                    ],
                    [
                        'title' => fake()->sentence(1)
                    ]
                ]
            ]
        ];

        $wizard = Livewire::test(QuizWizardComponent::class, ['quiz_type' => 3, 'quiz_id' => 'null']);

        $wizard->assertSee('Podstawowe dane')
            ->assertSee('Dodaj obrazek na okładkę');

        $quizDetailsState = $wizard->getStepState('quiz-details-step');

        Livewire::test('quiz-details-step', $quizDetailsState)
            ->set('title', $data['quiz_title'])
            ->set('description', $data['description'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Pytanie 1');

        $questionsState = $wizard->getStepState('questions-step');

        Livewire::test('questions-step', $questionsState)
            ->set('questions.0.title', $data['question']['title'])
            ->set('questions.0.answers.0.title', $data['question']['answers'][0]['title'])
            ->set('questions.0.answers.1.title', $data['question']['answers'][1]['title'])
            ->assertDontSee('Dodaj pytanie +')
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Uzupełnianie wyników jest opcją dodatkową.');

        $resultMessagesState = $wizard->getStepState('result-messages-step');

        Livewire::test('result-messages-step', $resultMessagesState)
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Świetnie! Twój quiz został utworzony.');

        $this->assertDatabaseHas(Quiz::class, ['title' => $data['quiz_title'], 'description' => $data['description']]);
        $this->assertDatabaseHas(Question::class, ['title' => $data['question']['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][0]['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][1]['title']]);
    }

    public function test_create_psychotest_quiz()
    {
        $this->seed(QuizTypesSeeder::class);

        $this->actingAs(User::factory()->create());

        $data = [
            'quiz_title' => fake()->sentence(1),
            'description' => fake()->text(),
            'question' => [
                'title' => fake()->sentence(1),
                'answers' => [
                    [
                        'title' => fake()->sentence(1),
                    ],
                    [
                        'title' => fake()->sentence(1),
                    ]
                ]
            ],
            'results' => [
                [
                    'title' => fake()->sentence(1),
                    'description' => fake()->text()

                ],
                [
                    'title' => fake()->sentence(1),
                    'description' => fake()->text()
                ]
            ]
        ];

        $wizard = Livewire::test(QuizWizardComponent::class, ['quiz_type' => 4, 'quiz_id' => 'null']);

        $wizard->assertSee('Podstawowe dane')
            ->assertSee('Dodaj pytania')
            ->assertSee('Wyniki')
            ->assertSee('Dodaj obrazek na okładkę');

        $quizDetailsState = $wizard->getStepState('quiz-details-step');

        Livewire::test('quiz-details-step', $quizDetailsState)
            ->set('title', $data['quiz_title'])
            ->set('description', $data['description'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Wynik 1');

        $resultMessagesState = $wizard->getStepState('result-messages-step');

        Livewire::test('result-messages-step', $resultMessagesState)
            ->set('results.0.title', $data['results'][0]['title'])
            ->set('results.0.description', $data['results'][0]['description'])
            ->set('results.1.title', $data['results'][1]['title'])
            ->set('results.1.description', $data['results'][1]['description'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Pytanie 1');

        $questionsState = $wizard->getStepState('questions-step');

        Livewire::test('questions-step', $questionsState)
            ->assertSee($data['results'][0]['title'])
            ->assertSee($data['results'][1]['title'])
            ->set('questions.0.title', $data['question']['title'])
            ->set('questions.0.answers.0.title', $data['question']['answers'][0]['title'])
            ->set('questions.0.answers.1.title', $data['question']['answers'][1]['title'])
            ->call('submit')
            ->emitEvents()->in($wizard);


        $wizard->assertSee('Świetnie! Twój quiz został utworzony.');

        $this->assertDatabaseHas(Quiz::class, ['title' => $data['quiz_title'], 'description' => $data['description']]);
        $this->assertDatabaseHas(Question::class, ['title' => $data['question']['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][0]['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][1]['title']]);
    }

    public function test_create_what_do_you_prefer_quiz()
    {
        $this->seed(QuizTypesSeeder::class);

        $this->actingAs(User::factory()->create());

        $data = [
            'quiz_title' => fake()->sentence(1),
            'description' => fake()->text(),
            'question' => [
                'title' => fake()->sentence(1),
                'answers' => [
                    [
                        'title' => fake()->sentence(1)
                    ],
                    [
                        'title' => fake()->sentence(1)
                    ]
                ]
            ]
        ];

        $wizard = Livewire::test(QuizWizardComponent::class, ['quiz_type' => 5, 'quiz_id' => 'null']);

        $wizard->assertSee('Podstawowe dane')
            ->assertSee('Dodaj obrazek na okładkę');

        $quizDetailsState = $wizard->getStepState('quiz-details-step');

        Livewire::test('quiz-details-step', $quizDetailsState)
            ->set('title', $data['quiz_title'])
            ->set('description', $data['description'])
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Pytanie 1');

        $questionsState = $wizard->getStepState('questions-step');

        Livewire::test('questions-step', $questionsState)
            ->set('questions.0.title', $data['question']['title'])
            ->set('questions.0.answers.0.title', $data['question']['answers'][0]['title'])
            ->set('questions.0.answers.1.title', $data['question']['answers'][1]['title'])
            ->assertSee('Dodaj pytanie +')
            ->call('submit')
            ->emitEvents()->in($wizard);

        $wizard->assertSee('Świetnie! Twój quiz został utworzony.');

        $this->assertDatabaseHas(Quiz::class, ['title' => $data['quiz_title'], 'description' => $data['description']]);
        $this->assertDatabaseHas(Question::class, ['title' => $data['question']['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][0]['title']]);
        $this->assertDatabaseHas(Answers::class, ['title' => $data['question']['answers'][1]['title']]);
    }
}
