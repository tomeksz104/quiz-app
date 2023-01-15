<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function view;

class UserController extends Controller
{
    public function show(string $username, Request $request, User $user): View
    {
        $user = User::where('username', $username)->withCount('quizzes', 'results', 'comments')->firstOrFail();

        foreach($user->results as $user_result)
        {
            $result = explode('/',$user_result->result);
            $correct_answers =+ $result[0];
            $total_questions =+ $result[1];
        }

        if(isset($total_questions))
        {
            $percentage_of_correct_answers = $correct_answers/$total_questions*100.0;
        }

        return view('user.user-profile', [
            'user' => $user,
            'percentage_of_correct_answers' => $percentage_of_correct_answers ?? null,
        ]);
    }
}
