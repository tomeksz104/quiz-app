<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResultsQuiz extends Model
{
    use HasFactory;

    protected $fillable = ['result', 'ip_adress', 'user_id', 'quiz_id', 'time_spent'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(ResultMessage::class, 'result_message_id');
    }

    public function question_results(): HasMany
    {
        return $this->hasMany(ResultsQuestion::class, 'result_quiz_id');
    }
}
