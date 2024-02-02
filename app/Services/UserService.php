<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService extends CrudService {

    public function __construct(UserInterface $user_interface) {
        $this->crud_interface = $user_interface;
    }

    public function assignCar(int $user_id, int $car_id ) : User
    {
        return $this->crud_interface->assignCar($user_id, $car_id);
    }

    public function unassignCar(int $user_id, int $car_id ) : User
    {
        return $this->crud_interface->unassignCar($user_id, $car_id);
    }

    public function carsByUser(int $user_id, QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->crud_interface->carsByUser($user_id, $query_param);
    }
}