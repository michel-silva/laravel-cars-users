<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
}
