<?php

namespace App\Models;

use App\Enums\QuizStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Quiz extends Model implements Searchable
{
    use HasFactory, Sluggable;

    protected $fillable = ['quiz_type', 'title', 'slug', 'category_id', 'user_id', 'description', 'time_for_answer', 'status', 'public', 'views', 'votes'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    public $searchableType = 'Quizy';

    public function getSearchResult(): SearchResult
     {
        $url = route('quiz_show', $this->slug);

         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            $url
         );
     }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function type(): HasOne
    {
        return $this->hasOne(QuizType::class, 'id', 'quiz_type');
    }

    public function results(): HasMany
    {
        return $this->hasMany(ResultsQuiz::class);
    }

    public function result_messages(): HasMany
    {
        return $this->hasMany(ResultMessage::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function quizView(): HasMany
    {
        return $this->hasMany(QuizView::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(QuizVote::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function showQuiz()
    {
        if(auth()->id()==null){
            return $this->quizView()
                ->where('ip', '=',  request()->ip())->exists();
        }

        return $this->quizView()
            ->where(function($quizViewsQuery) { $quizViewsQuery
                ->where('session_id', '=', request()->getSession()->getId())
                ->orWhere('user_id', '=', (auth()->check()));})->exists();
    }

    public function isVoted()
    {
        if(auth()->id()==null){
            return $this->votes()
                ->where('ip', '=',  request()->ip())->get()->pluck('id');
        }

        return $this->votes()
            ->where(function($quizVotesQuery) {
                $quizVotesQuery->where('user_id', '=', (auth()->check()));
            })->get()->pluck('id');
    }

    public function scopePending($query): Builder
    {
        return $query->where('status', QuizStatus::PENDING);
    }

    public function scopeMostViewed(Builder $query): Collection
    {
        $this->total = 5;

        $quizzes = $query->join('quiz_views', function ($join) {
                $join->on('quizzes.id', '=', 'quiz_views.quiz_id')
                    ->where('quiz_views.created_at','>=', now()->subdays(7));
            })
            ->groupBy('quizzes.id')
            ->where('status', QuizStatus::APPROVED)
            ->with('image', 'user')
            ->get(['quizzes.*', DB::raw('count(quiz_views.quiz_id) as quiz_views')])
            ->take($this->total);

        if(count($quizzes) < $this->total)
        {
            return Quiz::inRandomOrder($this->total)->with('image', 'user')->limit($this->total)->get();
        }
        else
        {
            return $quizzes;
        }
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($quiz) { // before delete() method call this
            if(file_exists(public_path($quiz->image->path)))
            {
                unlink(public_path($quiz->image->path));  // delete image if exists
            }
            $quiz->image()->delete();
        });
    }
}
