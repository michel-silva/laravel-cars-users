<?php

namespace App\Enums\Car;

use App\Traits\EnumRandonValue;

enum FuelType : string
{
    use EnumRandonValue;

    case Gasoline = 'Gasolina';
    case Alcohol = 'Alcool';
    case Diesel = 'Diesel';
    case Electric = 'Eletrico';
    case Hybrid = 'Hibrido';
}