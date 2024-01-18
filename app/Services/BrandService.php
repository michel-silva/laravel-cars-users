<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\BrandInterface;
use App\Contracts\CarInterface;
use App\Repositories\CarRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BrandService {
    
    private BrandInterface $brand_interface;

    public function __construct(BrandInterface $brand_interface) {
        $this->brand_interface = $brand_interface;
    }

    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->brand_interface->getPaginate($query_param);
    }
}