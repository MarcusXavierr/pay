<?php

namespace App\Support\Constants;

use Illuminate\Support\Collection;

class JobContractType
{
    public const CLT = 'clt';
    public const PJ = 'pj';
    public const FREELANCER = 'freelancer';

    public static function allContractTypes(): Collection
    {
        return collect([
            self::CLT,
            self::PJ,
            self::FREELANCER,
        ]);
    }
}
