<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Answers extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'correct', 'question_id', 'result_message_id'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($answer) { // before delete() method call this
            if(file_exists(public_path($answer->image->path)))
            {
                unlink(public_path($answer->image->path));  // delete file if exists
            }
            $answer->image()->delete();
        });
    }
}
