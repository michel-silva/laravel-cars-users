<?php

namespace App\Enums\Car;

enum FuelType : string
{
    case Gasoline = 'Gasolina';
    case Alcohol = 'Alcool';
    case Diesel = 'Diesel';
    case Electric = 'Eletrico';
    case Hybrid = 'Hibrido';
}