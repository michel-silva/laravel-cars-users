<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\CarInterface;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CarRepository implements CarInterface{
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator 
    {
        return Car::paginate($query_param->per_page);
    }

    public function getById(int $car_id) : Car 
    {
        return Car::findOrFail($car_id);
    }

    public function create(array $car_data) : Car 
    {
        return Car::create($car_data);
    }

    public function update(int $car_id, array $car_data) : Car 
    {
        $car = Car::findOrFail($car_id);
        $car->update($car_data);
        return $car;
    }

    public function delete(int $car_id) : Car 
    {
        $car = Car::findOrFail($car_id);
        $car->delete();
        return $car;
    }
}