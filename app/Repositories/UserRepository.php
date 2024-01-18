<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

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
        $user->update(collect($user_data)->pluck(['email', 'password'])->toArray());
        return $user;
    }

    public function delete(int $user_id) : User
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return $user;
    }
}