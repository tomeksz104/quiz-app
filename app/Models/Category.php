<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'color'];

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categoryView(): HasMany
    {
        return $this->hasMany(CategoryView::class);
    }

    public function showCategory()
    {
        if(auth()->id()==null)
        {
            return $this->categoryView()
                ->where('ip', '=',  request()->ip())->exists();
        }

        return $this->categoryView()
            ->where(function($categoryViewsQuery) {
                $categoryViewsQuery
                ->where('session_id', '=', request()->getSession()->getId())
                ->orWhere('user_id', '=', ( auth()->check()) );
            })->exists();
    }

    public function scopeMostViewed(Builder $query): Collection
    {
        $this->total = 15;

        $categories = $query->join('category_views', function ($join) {
            $join->on('categories.id', '=', 'category_views.category_id')
                ->where('category_views.created_at','>=', now()->subdays(1));
        })
            ->groupBy('categories.id')
            ->get(['categories.*', DB::raw('count(category_views.category_id) as category_views')])
            ->take($this->total);

        if(count($categories) < $this->total)
        {
            return Category::inRandomOrder($this->total)->limit($this->total)->get();
        }
        else
        {
            return $categories;
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

}
