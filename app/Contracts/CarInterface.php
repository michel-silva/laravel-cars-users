<?php

namespace App\Contracts;

use App\Classes\QueryParam;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CarInterface {
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator;
    public function getById(int $car_id) : Car;
    public function create(array $car_data) : Car;
    public function update(int $car_id, array $car_data) : Car;
    public function delete(int $car_id) : Car;

}