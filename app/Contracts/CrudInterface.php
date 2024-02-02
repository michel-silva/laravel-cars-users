<?php

namespace App\Contracts;

use App\Classes\QueryParam;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface CrudInterface {
    public function getPaginate(QueryParam $query_param) : LengthAwarePaginator;
    public function getById(int $model_id) : Model;
    public function create(array $model_data) : Model;
    public function update(int $model_id, array $model_data) : Model;
    public function delete(int $model_id) : Model;
}