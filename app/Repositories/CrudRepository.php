<?php

namespace App\Repositories;

use App\Classes\QueryParam;
use App\Contracts\CarInterface;
use App\Contracts\CrudInterface;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CrudRepository implements CrudInterface {

    public $model;

    public function __construct($model) 
    {
        $this->model = $model;
    }

    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator
    {
        return $this->model->paginate($query_param->per_page);
    }

    public function getById(int $user_id) : Model 
    {
        return $this->model->findOrFail($user_id);
    }

    public function create(array $user_data) : Model 
    {
        return $this->model->create($user_data);
    }

    public function update(int $user_id, array $user_data) : Model
    {
        $model = $this->model->findOrFail($user_id);

        $model->update($user_data);
        return $model;
    }

    public function delete(int $user_id) : Model
    {
        $model = $this->model->findOrFail($user_id);
        $model->delete();
        return $model;
    }
}