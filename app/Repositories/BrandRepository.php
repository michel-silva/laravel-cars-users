<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\BrandInterface;
use App\Models\Brand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BrandRepository implements BrandInterface{
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator 
    {
        return Brand::paginate($query_param->per_page);
    }
}