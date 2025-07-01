<?php

namespace App\Enum;

enum SponsorTierEnum: string
{

    case GOLD = 'gold';
    case SILVER = 'silver';
    case BRONZE = 'bronze';
    case COMMUNITY = 'platinum';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }


}
