<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'quiz_id'];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /*public static function boot() {
        parent::boot();

        static::deleting(function($question) { // before delete() method call this
            if(file_exists(public_path($question->image->path)))
            {
                unlink(public_path($question->image->path));  // delete file if exists
            }
            $question->image()->delete();
        });
    }*/

}
