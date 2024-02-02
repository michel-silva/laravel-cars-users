<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\CarInterface;
use App\Models\Car;
use App\Repositories\CrudRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CarService extends CrudService {
    public function __construct(CarInterface $car_interface) {
        $this->crud_interface = $car_interface;
    }
}