<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\CarInterface;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CarRepository extends CrudRepository implements CarInterface{

    public function __construct() 
    {
        $this->model = new Car;
    }
}