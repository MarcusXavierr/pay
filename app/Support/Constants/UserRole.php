<?php

namespace App\Support\Constants;

use Illuminate\Database\Eloquent\Collection;

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
