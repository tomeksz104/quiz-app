<?php

namespace App\Enums;

class QuizStatus
{
    const PENDING = 'pending';
    const APPROVED = 'approved';

    const TYPES = [
        self::PENDING,
        self::APPROVED,
    ];

}
