<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ResultMessage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'quiz_id', 'default', 'rating_from'];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($result_message) { // before delete() method call this
            if(file_exists(public_path($result_message->image->path)))
            {
                unlink(public_path($result_message->image->path));  // delete file if exists
            }
            $result_message->image()->delete();
        });
    }
}
