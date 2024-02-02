<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\UserInterface;
use App\Models\Car;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository extends CrudRepository implements UserInterface {
    
    public function __construct() 
    {
        $this->model = new User;
    }

    public function assignCar(int $user_id, int $car_id) : User
    {
        $user = $this->model->findOrFail($user_id);
        $user->cars()->syncWithoutDetaching([$car_id]);

        return $user;
    }

    public function unassignCar(int $user_id, int $car_id) : User
    {
        $user = $this->model->findOrFail($user_id);
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