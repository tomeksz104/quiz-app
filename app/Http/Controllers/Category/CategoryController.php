<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use function view;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('created_at', 'desc')
            ->withCount('quizzes')
            ->with('image')
            ->get();

        return view('category.category-list',[
            'categories' => $categories,
        ]);
    }
}
