<?php

namespace App\Enums\Car;

use App\Traits\EnumRandonValue;

enum TransmissionType : string
{
    use EnumRandonValue;

    case Automatic = 'Automatico';
    case Manual = 'Manual';
}