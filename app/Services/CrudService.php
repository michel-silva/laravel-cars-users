<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\CarInterface;
use App\Contracts\CrudInterface;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CrudService {
    
    public CrudInterface $crud_interface;

    public function __construct(CrudInterface $crud_interface) {
        $this->crud_interface = $crud_interface;
    }

    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->crud_interface->getPaginate($query_param);
    }

    public function getById(int $car_id) : Car
    {
        return $this->crud_interface->getById($car_id);
    }

    public function create(array $car_data) : Car
    {
        return $this->crud_interface->create($car_data);
    }

    public function update(int $car_id, array $car_data) : Car
    {
        return $this->crud_interface->update($car_id, $car_data);
    }

    public function delete(int $car_id) : Car
    {
        return $this->crud_interface->delete($car_id);
    }
}