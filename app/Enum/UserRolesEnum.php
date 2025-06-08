<?php

namespace App\Enum;

enum UserRolesEnum: string
{
    case Admin = 'admin';
    case Organizer = 'organizer';

    case Member = 'member';
}
