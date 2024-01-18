<?php

namespace App\Enums\Car;

enum BodyType : string
{
    case Sedan = 'Sedan';
    case Hatchbach = 'Hatchback';
    case SUV = 'SUV';
    case Truck = 'Caminhão';
}