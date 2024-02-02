<?php

namespace App\Contracts;

use App\Classes\QueryParam;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserInterface extends CrudInterface {
    public function assignCar(int $user_id, int $car_id) : User;
    public function unassignCar(int $user_id, int $car_id) : User;
    public function carsByUser(int $user_id, QueryParam $query_param) : LengthAwarePaginator;
}