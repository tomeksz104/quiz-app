<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Newsletter\NewsletterController;
use App\Http\Controllers\Quiz\PendingQuizzesController;
use App\Http\Controllers\Quiz\QuizTypeController;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Result\ResultController;
use App\Http\Controllers\User\UserController;
use App\Http\Livewire\Admin\Categories;
use App\Http\Livewire\admin\Quizzes;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\WebsiteSettings;
use App\Http\Livewire\Components\TakeQuiz;
use App\Http\Livewire\User\AccountSettings;
use App\Http\Livewire\User\UserQuizzes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('admin')->name('Admin.')->as('admin.')
    ->middleware('can:isAdmin')
    ->group(function () {
    Route::get('/categories', Categories::class)
        ->name('categories');

    Route::get('/quizzes', Quizzes::class)
        ->name('quizzes');

    Route::get('/users', Users::class)
        ->name('users');

    Route::get('/ustawienia-strony', WebsiteSettings::class)
        ->name('website_settings');
});

Route::middleware('auth')
    ->group(function () {
    Route::get('/aktywnosc', [ResultController::class, 'list'])
        ->name('my_activity');

    Route::get('/ustawienia-konta', AccountSettings::class)
        ->name('account_settings');

    Route::get('/utworz-quiz/{quiz_type_slug}', [QuizController::class, 'create'])
        ->name('create_quiz');

        Route::get('/quizzes', UserQuizzes::class)
        ->name('user_quizzes');

    Route::get('/edytuj-quiz/{quiz_slug}', [QuizController::class, 'edit'])
        ->name('edit_quiz');
});

Route::get('/profil/{username}', [UserController::class, 'show'])
    ->name('user_profile');

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories_list');

Route::get('/poczekalnia', [PendingQuizzesController::class, 'index'])
    ->name('pending_list');

Route::get('/quiz/{slug}', [QuizController::class, 'show'])
    ->name('quiz_show');

Route::get('/wybierz-typ', [QuizTypeController::class, 'index'])
    ->name('select_quiz_type');

Route::get('/take-quiz/{id}', TakeQuiz::class)
    ->name('take-quiz');

Route::get('/result/{result_quiz_id}', [ResultController::class, 'show'])
    ->name('result_show');

Route::post('newsletter', [NewsletterController::class, 'store'])
    ->name('newsletter_store');
