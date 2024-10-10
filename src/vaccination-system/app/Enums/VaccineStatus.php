<?php

namespace App\Enums;

enum VaccineStatus: string
{
    case NotRegistered = 'Not registered';
    case NotScheduled = 'Not scheduled';
    case Scheduled = 'Scheduled';
    case Vaccinated = 'Vaccinated';

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}