<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\CarInterface;
use App\Models\Car;
use App\Repositories\CarRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CarService {
    
    private CarInterface $car_interface;

    public function __construct(CarInterface $car_interface) {
        $this->car_interface = $car_interface;
    }

    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->car_interface->getPaginate($query_param);
    }

    public function getById(int $car_id) : Car
    {
        return $this->car_interface->getById($car_id);
    }

    public function create(array $car_data) : Car
    {
        return $this->car_interface->create($car_data);
    }

    public function update(int $car_id, array $car_data) : Car
    {
        return $this->car_interface->update($car_id, $car_data);
    }

    public function delete(int $car_id) : Car
    {
        return $this->car_interface->delete($car_id);
    }
}