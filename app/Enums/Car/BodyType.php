<?php

namespace App\Enums\Car;
use App\Traits\EnumRandonValue;

enum BodyType : string
{
    use EnumRandonValue;
        
    case Sedan = 'Sedan';
    case Hatchbach = 'Hatchback';
    case SUV = 'SUV';
    case Truck = 'Caminhão';
}