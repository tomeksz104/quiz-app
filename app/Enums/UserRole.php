<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = 'Administrator';
    const USER = 'Użytkownik';

    const TYPES = [
        self::ADMIN,
        self::USER,
    ];
}
