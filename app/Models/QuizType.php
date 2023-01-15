<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
