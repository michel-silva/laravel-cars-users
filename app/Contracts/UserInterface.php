<?php

namespace App\Contracts;

use App\Classes\QueryParam;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserInterface {
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator;
    public function getById(int $user_id) : User;
    public function create(array $user_data) : User;
    public function update(int $user_id, array $user_data) : User;
    public function delete(int $user_id) : User;
    public function assignCar(int $user_id, int $car_id) : User;
    public function unassignCar(int $user_id, int $car_id) : User;
    public function carsByUser(int $user_id, QueryParam $query_param) : LengthAwarePaginator;
}