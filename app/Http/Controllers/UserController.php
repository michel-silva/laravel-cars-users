<?php

namespace App\Http\Controllers;

use App\Classes\QueryParam;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UsersResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $user_service;

    public function __construct(UserService $user_service) {
        $this->user_service = $user_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return UsersResource::collection($this->user_service->getPaginate(new QueryParam($request->per_page, $request->page)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        return UserResource::make($this->user_service->create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserResource::make($this->user_service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        return UserResource::make($this->user_service->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return UserResource::make($this->user_service->delete($id));
    }
}
