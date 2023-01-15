<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryView extends Model
{
    use HasFactory;

    public function categoryView(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function createViewLog($category)
    {
        $categoryViews= new CategoryView();
        $categoryViews->category_id = $category->id;
        $categoryViews->session_id = request()->getSession()->getId();
        $categoryViews->user_id = (auth()->check())?auth()->id() : null;
        $categoryViews->ip = request()->ip();
        $categoryViews->save();
    }
}
