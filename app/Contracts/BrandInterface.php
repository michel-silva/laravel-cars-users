<?php

namespace App\Contracts;

use App\Classes\QueryParam;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BrandInterface {
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator;
}