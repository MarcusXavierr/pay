<?php

namespace App\Support\Constants;

use Illuminate\Support\Collection;

class UserRole
{
    public const ADMIN = 'admin';
    public const CANDIDATE = 'candidate';

    public static function allRoles(): Collection
    {
        return collect([
            self::ADMIN,
            self::CANDIDATE,
        ]);
    }
}
