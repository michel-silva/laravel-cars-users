<?php

namespace App\Services;

use App\Classes\QueryParam;
use App\Contracts\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService {

    private UserInterface $user_interface;

    public function __construct(UserInterface $user_interface) {
        $this->user_interface = $user_interface;
    }

    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->user_interface->getPaginate($query_param);
    }

    public function getById(int $user_id) : User
    {
        return $this->user_interface->getById($user_id);
    }

    public function create(array $user_data) : User
    {
        return $this->user_interface->create($user_data);
    }

    public function update(int $user_id, array $user_data) : User
    {
        return $this->user_interface->update($user_id, $user_data);
    }

    public function delete(int $user_id) : User
    {
        return $this->user_interface->delete($user_id);
    }

    public function assignCar(int $user_id, int $car_id ) : User
    {
        return $this->user_interface->assignCar($user_id, $car_id);
    }

    public function unassignCar(int $user_id, int $car_id ) : User
    {
        return $this->user_interface->unassignCar($user_id, $car_id);
    }

    public function carsByUser(int $user_id, QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->user_interface->carsByUser($user_id, $query_param);
    }
}