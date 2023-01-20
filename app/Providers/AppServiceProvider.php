<?php

namespace App\Providers;

use App\Http\Livewire\Quizzes\QuizWizard\QuizWizardComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\QuestionsStepComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\QuizDetailsStepComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\ResultMessagesStepComponent;
use App\Http\Livewire\Quizzes\QuizWizard\Steps\SaveQuizStepComponent;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\ResultMessage;
use App\Models\Settings;
use App\Models\User;
use App\Observers\AnswerObserver;
use App\Observers\QuestionObserver;
use App\Observers\QuizObserver;
use App\Observers\ResultMessageObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();

        Livewire::component('quiz-wizard', QuizWizardComponent::class);
        Livewire::component('quiz-details-step', QuizDetailsStepComponent::class);
        Livewire::component('questions-step', QuestionsStepComponent::class);
        Livewire::component('result-messages-step', ResultMessagesStepComponent::class);
        Livewire::component('save-quiz-step', SaveQuizStepComponent::class);

        Quiz::observe(QuizObserver::class);
        Question::observe(QuestionObserver::class);
        Answer::observe(AnswerObserver::class);
        ResultMessage::observe(ResultMessageObserver::class);

        if( Schema::hasTable( 'quizzes' )
            && Schema::hasTable(  'users')
            && Schema::hasTable( 'categories') )
        {
            $quizzes_count = Quiz::count();
            $users_count = User::count();
            $categories_count = Category::count();

            View::share(
                [
                    'quizzes_count' => $quizzes_count,
                    'users_count' => $users_count,
                    'categories_count' => $categories_count,
                ]
            );
        }

        if( Schema::hasTable( 'settings')  && Schema::hasTable( 'categories') )
        {
            $settings = Settings::find(1);

            View::share(
                [
                    'website_logo' => $settings->logo  ?? null,
                    'website_about_footer' => $settings->about_footer  ?? null,
                    'website_copyright' => $settings->copyright ?? null,
                    'categories_footer' =>  Category::inRandomOrder()->limit(4)->get(),
                    'website_youtube' => $settings->youtube  ?? null,
                    'website_facebook' => $settings->facebook  ?? null,
                    'website_twitter' => $settings->twitter  ?? null,
                    'website_instagram' => $settings->instagram  ?? null,
                    'website_twitch' => $settings->twitch  ?? null,

                ]
            );
        }

       //Model::shouldBeStrict(!$this->app->isProduction());
    }
}
