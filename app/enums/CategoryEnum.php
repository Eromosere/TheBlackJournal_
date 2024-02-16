<?php

namespace App\Enums;


enum CategoryEnum: string
{
    case active = 'active';
    case inactive = 'inactive';

    public static function getValues(): array
    {
        return [
            self::active,
            self::inactive,
        ];
    }
}
