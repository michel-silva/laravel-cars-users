<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Version extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'car_brand_id',
        'name',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
