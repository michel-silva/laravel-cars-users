<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
}
