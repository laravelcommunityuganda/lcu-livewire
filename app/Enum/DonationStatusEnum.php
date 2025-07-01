<?php

namespace App\Enum;

enum DonationStatusEnum: string
{
    case Pending = 'pending';
    case Completed = 'completed';
    case Failed = 'failed';
}
