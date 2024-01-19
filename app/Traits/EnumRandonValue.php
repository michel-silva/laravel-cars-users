<?php

namespace App\Traits;

use ReflectionClass;

trait EnumRandonValue {
    public static function getRandonValue() : string
    {
        $enum = new ReflectionClass(static::class);
        $enum_types = $enum->getConstants();
        return $enum_types[array_rand($enum_types)]->value;
    }
}