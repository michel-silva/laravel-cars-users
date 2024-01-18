<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_brand_id',
        'name',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
