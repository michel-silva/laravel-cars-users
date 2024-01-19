<?php

namespace App\Models;

use App\Enums\Car\BodyType;
use App\Enums\Car\FuelType;
use App\Enums\Car\TransmissionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id',
        'version_id',
        'plate',
        'color',
        'body_type',
        'fuel_type',
        'transmission_type',
        'year',
    ];

    protected $casts = [
        'body_type' => BodyType::class,
        'fuel_type' => FuelType::class,
        'transmission_type' => TransmissionType::class,
        'price' => 'double',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
