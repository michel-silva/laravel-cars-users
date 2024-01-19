<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\UserInterface;
use App\Models\Car;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserInterface {
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator
    {
        return User::paginate($query_param->per_page);
    }

    public function getById(int $user_id) : User 
    {
        return User::findOrFail($user_id);
    }

    public function create(array $user_data) : User 
    {
        return User::create($user_data);
    }

    public function update(int $user_id, array $user_data) : User
    {
        $user = User::findOrFail($user_id);

        unset($user_data['name']);
        $user->update($user_data);
        return $user;
    }

    public function delete(int $user_id) : User
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return $user;
    }

    public function assignCar(int $user_id, int $car_id) : User
    {
        $user = User::findOrFail($user_id);
        $user->cars()->syncWithoutDetaching([$car_id]);

        return $user;
    }

    public function unassignCar(int $user_id, int $car_id) : User
    {
        $user = User::findOrFail($user_id);
        $user->cars()->detach($car_id);

        return $user;
    }

    public function carsByUser(int $user_id, QueryParam $query_param) : LengthAwarePaginator
    {
        $cars = Car::whereHas('users', function($query) use($user_id) {
            $query->where('id', $user_id);
        })->paginate($query_param->per_page);

        return $cars;
    }
}